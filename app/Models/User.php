<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
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
    
   
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public static function validate(Request $request)
    {
        $request->validate(
            [
            "name" => "required",
            "email" => "required",
            "password" => "required",
            ]
        );
    }
    public function getName()
    {

        return $this->attributes['name'];
    }

    public function setName($name)
    {

        $this->attributes['name'] = $name;
    }
  
    public function getEmail()
    {

        return $this->attributes['email'];
    }

    public function setEmail($email)
    {

        $this->attributes['email'] = $email;

    }

    public function getAddress()
    {

        return $this->attributes['address'];
    }


    public function setAddress($address)
    {

        $this->attributes['address'] = $address;
    }

    public function getRole()
    {

        return $this->attributes['role'];
    }

    public function setRole($role)
    {

        $this->attributes['role'] = $role;

    }
}
