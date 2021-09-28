<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComboCandy extends Model
{
    use HasFactory;
    //atributes combo_id, flower_id
    protected $table = 'combo_candies';

    public function getComboId()
    {

        return $this->attributes['combo_id'];
    }

    public function setComboId($combo_id)
    {

        $this->attributes['combo_id'] = $combo_id;
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
