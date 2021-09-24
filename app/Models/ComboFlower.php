<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComboFlower extends Model
{
    use HasFactory;
    //atributes combo_id, flower_id
    protected $table = 'combo_flowers';

    public function getComboId()
    {

        return $this->attributes['combo_id'];
    }

    public function setComboId($combo_id)
    {

        $this->attributes['combo_id'] = $combo_id;
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
