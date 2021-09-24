<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    use HasFactory;
    //atributes permissions_id, roles_id
    protected $table = 'permissions_roles';

    public function getPermissionId()
    {

        return $this->attributes['permissions_id'];
    }

    public function setPermissionId($permissions_id)
    {

        $this->attributes['permissions_id'] = $permissions_id;
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
