<?php

namespace App\Http\Controllers\Combo;
use App\Http\Controllers\Controller;
use App\Models\Combo;
use Illuminate\Http\Request;


class ComboController extends Controller
{


    public function index (){
        $data = [];
        $data = Combo::all();
        return view('combo.index')->with('data',$data);
    }

    public function create (){
        return view('combo.create');
    }

    public function save(Request $request)
    {
        Combo::validate($request);
        Combo::create($request->only(["name", "bouquetType", "rate", "price", "urlImg"]));
        return back()->with('success', 'Item updated successfully!');
    }

}