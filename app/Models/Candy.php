<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
class Candy extends Model
{
    use HasFactory;

    //attributes id, name, price, urlImg, created_at, updated_at

    protected $fillable = ['name', 'price', 'urlImg'];
    
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function bouquet()
    {
        return $this->belongsTo(Bouquet::class);
    }

    public function combo()
    {
        return $this->belongsTo(Combo::class);
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

    public function getBouquetId()
    {

        return $this->attributes['bouquet_id'];
    }

    public function setBouquetId($bouquet_id)
    {

        $this->attributes['bouquet_id'] = $bouquet_id;
    }

    public function getComboId()
    {

        return $this->attributes['combo_id'];
    }

    public function setComboId($combo_id)
    {

        $this->attributes['combo_id'] = $combo_id;
    }

}