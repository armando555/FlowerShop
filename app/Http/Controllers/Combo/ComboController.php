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
    public function show($id)
    {
        $data = [];
        $data = Combo::findOrFail($id);
        return view('combo.show')->with('data', $data);
    }

    public function edit($id)
    {
        $combo = Combo::findOrFail($id);
        return view('combo.edit')->with('data', $combo);
    }

    public function update(Request $request)
    {
        $combo = Combo::find($request->id);
        $combo->setName($request->name);
        $combo->setBouquetType($request->bouquetType);
        $combo->setRate($request->rate);
        $combo->setPrice($request->price);
        $combo->setUrlImg($request->urlImg);
        $combo->save();
        return back()->with('success', 'Item updated successfully!');
    }

}
