<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{

    public function form()
    {
        
        return view('form.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            "name" => "required",
            "bouquetType"=> "required",
            "rate"=>"required",
            "price" => "required"
        ]);
        
        dd($request->all());
        




        return redirect()->route('home.index');
    }
}
