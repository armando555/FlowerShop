<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResources extends JsonResource

{

    public function toArray($request)

    {

        return [

            'name' => $this->getName(),
            
            'amount' => $this->getAmountPerFlower(),

            'price' => $this->getPrice(),

            'link' => "http://flowershop-tes.tk/flower/show/".$this->getId(),

        ];
    }
}
