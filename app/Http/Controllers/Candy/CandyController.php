<?php

namespace App\Http\Controllers\Candy;
use App\Http\Controllers\Controller;
use App\Models\Candy;
use Illuminate\Http\Request;


class CandyController extends Controller
{


    public function index()
    {
        $data = [];
        $data = Candy::all();
        return view('candy.index')->with('data', $data);
    }

    public function create()
    {
        return view('candy.create');
    }

    public function save(Request $request)
    {
        Candy::validate($request);
        Candy::create($request->only(["name", "bouquetType", "rate", "price", "urlImg"]));
        return back()->with('success', 'Item updated successfully!');
    }
    public function show($id)
    {
        $data = [];
        $data = Candy::findOrFail($id);
        return view('candy.show')->with('data', $data);
    }

    public function edit($id)
    {
        $candy = Candy::findOrFail($id);
        return view('candy.edit')->with('data', $candy);
    }

    public function update(Request $request)
    {
        $candy = Candy::find($request->id);
        $candy->setName($request->name);
        $candy->setBouquetType($request->bouquetType);
        $candy->setRate($request->rate);
        $candy->setPrice($request->price);
        $candy->setUrlImg($request->urlImg);
        $candy->save();
        return back()->with('success', 'Item updated successfully!');
    }

}
