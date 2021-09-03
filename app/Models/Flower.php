<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
class Flower extends Model
{
    use HasFactory;

    //attributes id, name, spice, amountPerFlower, color, description, price, created_at, updated_at

    protected $fillable = ['name', 'spice', 'amountPerFlower', 'color', 'description','price'];
    
    public function items()
    {
        return $this->belongsToMany(Item::class, 'items', 'id', 'id');
    }

    public function getId()
    {

        return $this->attributes['name'];
    }

    public function setId($name)
    {

        $this->attributes['name'] = $name;
    }

    public function getName()
    {

        return $this->attributes['name'];
    }

    public function setName($name)
    {

        $this->attributes['name'] = $name;
    }

    public function getSpice()
    {

        return $this->attributes['spice'];
    }

    public function setSpice($spice)
    {

        $this->attributes['spice'] = $spice;
    }

    public function getAmountPerFlower()
    {

        return $this->attributes['amountPerFlower'];
    }

    public function setAmountPerFlower($amountPerFlower)
    {

        $this->attributes['amountPerFlower'] = $amountPerFlower;
    }

    public function getColor()
    {

        return $this->attributes['color'];
    }

    public function setColor($color)
    {

        $this->attributes['color'] = $color;
    }

    public function getDescription()
    {

        return $this->attributes['description'];
    }

    public function setDescription($description)
    {

        $this->attributes['description'] = $description;
    }

    public function getPrice()
    {

        return $this->attributes['price'];
    }

    public function setPrice($price)
    {

        $this->attributes['price'] = $price;
    }
}