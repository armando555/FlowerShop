<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles', 'user_id', 'roles_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public static function validate(Request $request)
    {
        $request->validate(
            [
            "name" => "required",
            "address" => "required",
            "email" => "required",
            "password" => "required",
            ]
        );
    }

}
