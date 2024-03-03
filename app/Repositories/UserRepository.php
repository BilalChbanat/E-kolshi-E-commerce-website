<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository implements UserRepositoryInterface
{
    public function getByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function getByToken($token)
    {
        return User::where('remember_token', $token)->first();
    }

    public function create($data)
    {
        return User::create($data);
    }

    public function updatePassword($user, $password, $newToken)
    {
        $user->password = Hash::make($password);
        $user->remember_token = $newToken;
        $user->save();
    }
}
