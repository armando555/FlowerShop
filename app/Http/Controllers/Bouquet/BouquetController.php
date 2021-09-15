<?php

namespace App\Http\Controllers\Bouquet;
use App\Http\Controllers\Controller;
use App\Models\Bouquet;
use Illuminate\Http\Request;

class BouquetController extends Controller
{
    public function index()
    {
        $data = [];
        $data = Bouquet::all();
        return view('bouquet.index')->with("data",$data);
    }

    public function home()
    {
        return redirect()->route('bouquet.index');
    }

    public function show($id)
    {
        $bouquet = Bouquet::findOrFail($id);

        return view('bouquet.show')->with("data", $bouquet);
    }

    public function edit($id)
    {
        $bouquet = Bouquet::findOrFail($id);

        return view('bouquet.edit')->with("data", $bouquet);
    }

    public function create()
    {
        return view('bouquet.create');
    }

    public function save(Request $request)
    {
        Bouquet::validate($request);
        Bouquet::create($request->only(["name", "bouquetType", "rate", "urlImg","price"]));
        return back()->with('success', 'Item updated successfully!');
    }

    public function update(Request $request)
    {
        $bouquet = Bouquet::find($request->id);
        $bouquet->setName($request->name);
        $bouquet->setBouquetType($request->bouquetType);
        $bouquet->setRate($request->rate);
        $bouquet->setPrice($request->price);
        $bouquet->save();
        return back()->with('success', 'Item updated successfully!');
    }

}
