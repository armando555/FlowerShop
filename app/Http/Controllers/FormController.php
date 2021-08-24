<?php

namespace App\Http\Controllers;
use App\Models\Combo;
use Illuminate\Http\Request;


class FormController extends Controller {
    public function form(){       
        return view('form.create');
    }

    public function save(Request $request) {
        $request->validate([
            "name" => "required",
            "bouquetType"=> "required",
            "rate"=>"required",
            "price" => "required"
        ]);
        
        Combo::create($request->only(["name","bouquetType","rate","price"]));
        echo '<p>Usuario creado satisfactoriamente</p>';
        return redirect()->route('create.success');
    }

    public function success(){       
        return view('form.success');
    }

}
