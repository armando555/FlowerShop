<?php

namespace App\Http\Controllers\Flower;
use App\Http\Controllers\Controller;
use App\Models\Flower;

class FlowerControllerUser extends Controller
{
    public function index()
    {
        $data = [];
        $data = Flower::all();
        return view('flower.userindex')->with("data", $data);
    }
    
    public function home()
    {
        return redirect()->route('flower.userindex');
    }

    public function show($id)
    {
        $flower = Flower::findOrFail($id);

        return view('flower.usershow')->with("data", $flower);
    }


}
