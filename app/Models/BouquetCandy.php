<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BouquetCandy extends Model
{
    use HasFactory;
    //atributes bouquet_id, candy_id
    protected $table = 'bouquet_candies';

    public function getBouquetId()
    {

        return $this->attributes['bouquet_id'];
    }

    public function setBouquetId($bouquet_id)
    {

        $this->attributes['bouquet_id'] = $bouquet_id;
    }

    public function getCandyId()
    {

        return $this->attributes['candy_id'];
    }

    public function setCandyId($candy_id)
    {

        $this->attributes['candy_id'] = $candy_id;
    }

}
