<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'postal_code',
        'country',
        'city',
        'address',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static public function getEmailsingle($email){
        
        return User::where('email', '=', $email)->first();
    }
    
    static public function getTokenSingle($remember_token){
        
        return User::where('remember_token', '=', $remember_token)->first();
    }


    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function hasRole($roleName){
        return $this->role()->where('name' , $roleName)->exists();
    }

    // Product

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Cart
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    //wishlist
    public function wishlistItems()
    {
        return $this->hasMany(WishList::class);
    }

    

}