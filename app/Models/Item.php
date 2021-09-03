<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
class Item extends Model
{
    use HasFactory;

    //attributes id, type, amount, subtotal, discount, order_id, flower_id, bouquet_id, candy_id, combo_id, created_at, updated_at

    protected $fillable = ['type', 'amount', 'subtotal', 'discount', 'order_id'];
    
    public function getId()
    {

        return $this->attributes['name'];
    }

    public function setId($name)
    {

        $this->attributes['name'] = $name;
    }

    public function getType()
    {

        return $this->attributes['type'];
    }

    public function setType($type)
    {

        $this->attributes['type'] = $type;
    }

    public function getAmount()
    {

        return $this->attributes['amount'];
    }

    public function setAmount($amount)
    {

        $this->attributes['amount'] = $amount;
    }

    public function getSubtotal()
    {

        return $this->attributes['subtotal'];
    }

    public function setSubtotal($subtotal)
    {

        $this->attributes['subtotal'] = $subtotal;
    }

    public function getDiscount()
    {

        return $this->attributes['discount'];
    }

    public function setDiscount($discount)
    {

        $this->attributes['discount'] = $discount;
    }

    public function getOrderId()
    {

        return $this->attributes['order_id'];
    }

    public function setOrderId($order_id)
    {

        $this->attributes['order_id'] = $order_id;
    }

    public function getFlowerId()
    {

        return $this->attributes['flower_id'];
    }

    public function setFlowerId($flower_id)
    {

        $this->attributes['flower_id'] = $flower_id;
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

    public function getCandyId()
    {

        return $this->attributes['candy_id'];
    }

    public function setCandyId($candy_id)
    {

        $this->attributes['candy_id'] = $candy_id;
    }

    public function candy()
    {
        return $this->belongsTo(Candy::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function combo()
    {
        return $this->belongsTo(Combo::class);
    }

    public function bouquet()
    {
        return $this->belongsTo(Bouquet::class);
    }

    public function flower()
    {
        return $this->belongsTo(Flower::class);
    }

}