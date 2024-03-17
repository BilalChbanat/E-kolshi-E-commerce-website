<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\ForgotPasswordMail;
use App\Models\Role;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class AuthController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.register');
    }
    public function loginForm()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'postal_code' => 'required|max:255|integer',
            'country' => 'required|max:255|string',
            'city' => 'required|max:255|string',
            'address' => 'required|max:255|string',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->hasRole('admin')) {
                $request->session()->regenerate();
                return redirect('/dashboard');
            } else {
                return redirect('/');
            }
        }
        return back()->withInput(['email' => $request->email])->withErrors(['email' => 'Invalid credentials']);
    }




    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|confirmed',
            'postal_code' => 'required|max:255|integer',
            'country' => 'required|max:255|string',
            'city' => 'required|max:255|string',
            'address' => 'required|max:255|string',
        ]);

        $roleUser = Role::where('name', 'user')->first();

        $user = $this->userRepository->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'postal_code' => $request->input('postal_code'),
            'country' => $request->input('country'),
            'city' => $request->input('city'), 
            'address' => $request->input('address'),
            'role_id' => $roleUser->id,
            'password' => Hash::make($request->input('password')),
        ]);

        auth()->login($user);

        return redirect('/');
    }


    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    function forgotpassword(){
        return view('auth.forgot');
    }

    function postforgotpassword(Request $request){
        $user = User::getEmailsingle($request->email);
        if(!empty($user)){
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return back()->with('success', 'please chek you email and rest your passworde');
        }else{
            return back()->with('error', 'Email not found');
        }
    }

    public function reset($remember_token){
        $user = User::getTokenSingle($remember_token);
        if(!empty($user)){
            $data['token'] = $remember_token;
            $data['user'] = $user;
            return view('auth.reset', $data);
        }else{
            abort(404);
        }
    }

    public function postReset($token, Request $request)
    {
        if ($request->password == $request->cpassword) {
            $user = $this->userRepository->getByToken($token);

            if ($user) {
                $newToken = Str::random(30);
                $this->userRepository->updatePassword($user, $request->password, $newToken);

                return redirect(url('login'))->with('success', 'Password has been updated successfully');
            } else {
                abort(404);
            }
        } else {
            return redirect()->back()->with('error', 'Please confirm the password');
        }
    }

}