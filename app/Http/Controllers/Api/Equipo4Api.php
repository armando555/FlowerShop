<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\ProductResources;
use App\Http\Controllers\Controller;

use App\Models\Flower;
use Http;

class Equipo4Api extends Controller

{

    public function index()

    {
        $answer = Http::get("http://www.great-idea.tk/public/api/courses");
        $answer->json();
        $data['courses'] = $answer['data'];
       # $data['courses'] = $data['courses'];
        return view('api.equipo4',compact('data'));
    }

}
