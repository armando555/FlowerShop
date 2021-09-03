<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    use HasFactory;

    //attributes id, total, user_id, created_at, updated_at

    protected $fillable = ['total','user_id'];
    
    public function items()
    {
        return $this->hasMany(Item::class, 'order_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getId()
    {

        return $this->attributes['name'];
    }

    public function setId($name)
    {

        $this->attributes['name'] = $name;
    }

    public function getTotal()
    {

        return $this->attributes['total'];
    }

    public function setTotal($total)
    {

        $this->attributes['total'] = $total;
    }

    public function getUserId()
    {

        return $this->attributes['user_id'];
    }

    public function setUserId($user_id)
    {

        $this->attributes['user_id'] = $user_id;
    }

    public function getDate()
    {

        return $this->attributes['created_at'];
    }

    public function setDate($date)
    {

        $this->attributes['created_at'] = $date;
    }    
}