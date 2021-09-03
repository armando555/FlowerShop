<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    //atributes user_id, roles_id
    protected $table = 'users_roles';

    public function getUserId()
    {

        return $this->attributes['user_id'];
    }

    public function setUserId($user_id)
    {

        $this->attributes['user_id'] = $user_id;
    }

    public function getRolesId()
    {

        return $this->attributes['roles_id'];
    }

    public function setRolesId($roles_id)
    {

        $this->attributes['roles_id'] = $roles_id;
    }

}
