<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BouquetFlower extends Model
{
    use HasFactory;
    //atributes bouquet_id, flower_id
    protected $table = 'bouquet_flowers';

    public function getBouquetId()
    {

        return $this->attributes['bouquet_id'];
    }

    public function setBouquetId($bouquet_id)
    {

        $this->attributes['bouquet_id'] = $bouquet_id;
    }

    public function getFlowerId()
    {

        return $this->attributes['flower_id'];
    }

    public function setFlowerId($flower_id)
    {

        $this->attributes['flower_id'] = $flower_id;
    }

}
