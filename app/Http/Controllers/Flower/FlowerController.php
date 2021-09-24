<?php

namespace App\Http\Controllers\Flower;
use App\Http\Controllers\Controller;
use App\Models\Flower;
use Illuminate\Http\Request;

class FlowerController extends Controller
{
    public function index()
    {
        $data = [];
        $data = Flower::all();
        return view('flower.index')->with("data", $data);
    }
    
    public function home()
    {
        return redirect()->route('flower.index');
    }

    public function show($id)
    {
        $flower = Flower::findOrFail($id);

        return view('flower.show')->with("data", $flower);
    }

    public function edit($id)
    {
        $flower = Flower::findOrFail($id);

        return view('flower.edit')->with("data", $flower);
    }

    public function create()
    {
        return view('flower.create');
    }

    public function save(Request $request)
    {
        Flower::validate($request);
        Flower::create($request->only(["name", "spice", "amountPerFlower", "color", "description", "price"]));
        return back()->with('success', 'Item updated successfully!');
    }

    public function update(Request $request)
    {
        $flower = Flower::find($request->id);
        $flower->setName($request->name);
        $flower->setSpice($request->spice);
        $flower->setAmountPerFlower($request->amountPerFlower);
        $flower->setColor($request->color);
        $flower->setDescription($request->description);
        $flower->setPrice($request->price);
        $flower->save();
        return back()->with('success', 'Item updated successfully!');
    }

}
