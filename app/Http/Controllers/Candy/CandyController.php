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
        Candy::create($request->only(["name", "price", "urlImg", "bouquet_id", "combo_id"]));
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
        $candy->setPrice($request->price);
        $candy->setUrlImg($request->urlImg);
        $candy->setBouquetId($request->bouquetId);
        $candy->setComboId($request->comboId);
        $candy->save();
        return back()->with('success', 'Item updated successfully!');
    }

}
