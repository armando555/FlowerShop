<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\ProductResources;
use App\Http\Controllers\Controller;

use App\Models\Flower;

class FlowerApi extends Controller

{
    //areglar esta vuelta
    public function index()

    {
        return ProductResources::collection(Flower::all());
    }

    public function show($id)

    {

        return Flower::findOrFail($id);
    }
}
