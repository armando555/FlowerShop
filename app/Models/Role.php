<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
class Role extends Model
{
    use HasFactory;

    //attributes id, name, created_at, updated_at

    protected $fillable = ['name'];
    
    public function permissions()
    {
        return $this->hasMany(Permission::class,'id','id');
    }

    public function getName()
    {

        return $this->attributes['name'];
    }

    public function setName($name)
    {

        $this->attributes['name'] = $name;
    }

    public function getId()
    {

        return $this->attributes['name'];
    }

    public function setId($name)
    {

        $this->attributes['name'] = $name;
    }

}