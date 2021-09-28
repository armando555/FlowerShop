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
        

        $input = $request->all();
        
        if ($request->hasFile('urlImg'))
        {
            $destination_path = '/public/img/combos';
            $image = $request->file('urlImg');
            $image_name=$image->getClientOriginalName();
            $path = $request->file('urlImg')->storeAs($destination_path,$image_name);
        
            $input['urlImg'] = $image_name;

        }

        Flower::create($input);
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
        $input = $request->all();
        
        if ($request->hasFile('urlImg'))
        {
            $destination_path = '/public/img/combos';
            $image = $request->file('urlImg');
            $image_name=$image->getClientOriginalName();
            $path = $request->file('urlImg')->storeAs($destination_path,$image_name);
        
            $input['urlImg'] = $image_name;

        }

        $flower->setUrlImg($input['urlImg']);
        $flower->save();
        return back()->with('success', 'Item updated successfully!');
    }

}
