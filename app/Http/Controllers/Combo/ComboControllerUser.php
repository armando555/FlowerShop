<?php

namespace App\Http\Controllers\Combo;
use App\Http\Controllers\Controller;
use App\Models\Combo;



class ComboControllerUser extends Controller
{


    public function index()
    {
        $data = [];
        $data = Combo::all();
        return view('combo.userindex')->with('data', $data);
    }

    public function show($id)
    {
        $data = [];
        $data = Combo::findOrFail($id);
        $flowers = $data->flowers()->get();
        $candies = $data->candies()->get();
        return view('combo.usershow')->with('data', $data)->with("flowers", $flowers)->with("candies",$candies);
    }
}
