<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Combo extends Model{

    use HasFactory;

    protected $fillable = [
        'name', 'bouquetType', 'rate', 'price'
    ];

    public function getId() {
        return $this->attributes['id'];
    }

    public function setIdCombo($id) {
        $this->attributes['id'] = $id;
    }

    public function getBouquetType() {
        return $this->attributes['bouquetType'];
    }

    public function setBouquetTypw($bouquetType) {
        $this->attributes['idCombo'] = $bouquetType;
    }

    public function getRate() {
        return $this->attributes['rate'];
    }

    public function setRate($rate) {
        $this->attributes['idCombo'] = $rate;
    }

    public function getPrice() {
        return $this->attributes['price'];
    }

    public function setPrice($price) {
        $this->attributes['idCombo'] = $price;
    }

}
