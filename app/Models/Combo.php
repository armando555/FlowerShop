<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
class Combo extends Model
{
    use HasFactory;

    //attributes id, name, bouquetType, rate, price, urlImg, created_at, updated_at

    protected $fillable = ['name', 'bouquetType', 'rate', 'price', 'urlImg'];
    
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function flowers()
    {
        return $this->belongsToMany(Flower::class, 'combo_flowers', 'combo_id', 'flower_id');
    }

    public function candies()
    {
        return $this->hasMany(Candy::class);
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

    public function getBouquetType()
    {

        return $this->attributes['bouquetType'];
    }

    public function setBouquetType($bouquetType)
    {

        $this->attributes['bouquetType'] = $bouquetType;
    }

    public function getRate()
    {

        return $this->attributes['rate'];
    }

    public function setRate($rate)
    {

        $this->attributes['rate'] = $rate;
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