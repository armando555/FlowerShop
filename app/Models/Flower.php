<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    use HasFactory;

    //attributes id, name, spice, amountPerFlower, color, description, price, created_at, updated_at

    protected $fillable = ['name', 'spice', 'amountPerFlower', 'color', 'description','price','urlImg'];
    
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function bouquetFlowers()
    {
        return $this->belongsToMany(Bouquet::class, 'bouquet_flowers', 'flower_id', 'bouquet_id');
    }

    public function comboFlowers()
    {
        return $this->belongsToMany(Combo::class, 'combo_flowers', 'flower_id', 'combo_id');
    }

    public static function validate(Request $request)
    {
        $request->validate(
            [
            "name" => "required",
            "spice" => "required",
            "amountPerFlower" => "required|numeric|gt:0",
            "color" => "required",
            "description" => "required",
            "price" => "required|numeric|gt:0",
            ]
        );
    }

    public function getId()
    {

        return $this->attributes['id'];
    }

    public function setId($id)
    {

        $this->attributes['id'] = $id;
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

    
    public function getUrlImg()
    {

        return $this->attributes['urlImg'];
    }

    public function setUrlImg($urlImg)
    {

        $this->attributes['urlImg'] = $urlImg;
    }

}