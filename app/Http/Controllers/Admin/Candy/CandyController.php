<?php

namespace App\Http\Controllers\Admin\Candy;
use App\Http\Controllers\Controller;
use App\Models\Candy;
use Illuminate\Http\Request;


class CandyController extends Controller
{


    public function index()
    {
        $data = [];
        $data['candies'] = Candy::all();
        return view('candy.index')->with('data', $data);
    }

    public function create()
    {
        return view('candy.create');
    }

    public function save(Request $request)
    {
        Candy::validate($request);

        $input = $request->all();
        
        if ($request->hasFile('urlImg')) {
            $destination_path = '/public/img/combos';
            $image = $request->file('urlImg');
            $image_name=$image->getClientOriginalName();
            $path = $request->file('urlImg')->storeAs($destination_path, $image_name);
        
            $input['urlImg'] = $image_name;

        }

        Candy::create($input);
        return back()->with('success', 'Item updated successfully!');
    }
    public function show($id)
    {
        $data = [];
        $data['candy'] = Candy::findOrFail($id);

        return view('candy.show')->with('data', $data);
    }

    public function edit($id)
    {
        $data = [];
        $data['candy'] = Candy::findOrFail($id);
        return view('candy.edit')->with('data', $data);
    }

    public function update(Request $request)
    {
        $candy = Candy::find($request->id);
        $candy->setName($request->name);
        $candy->setPrice($request->price);
        $candy->setUrlImg($request->urlImg);
        $candy->save();
        return back()->with('success', 'Item updated successfully!');
    }

    public function delete($id)
    {
        Candy::Where('id', $id)->delete();
        return redirect()->route('candy.index')->with('success', 'El producto se eliminó exitosamente!');
    }

}
