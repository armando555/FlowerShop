<?php

namespace App\Http\Controllers\Admin\Combo;
use App\Http\Controllers\Controller;
use App\Models\Combo;
use App\Models\Flower;
use App\Models\ComboFlower;
use App\Models\ComboCandy;
use App\Models\Candy;

use Illuminate\Http\Request;


class ComboController extends Controller
{


    public function index()
    {
        $data = [];
        $data['combos'] = Combo::all();
        return view('combo.index')->with('data', $data);
    }

    public function create()
    {
        $data = [];
        $data['flowers'] = Flower::all();
        $data['candies'] = Candy::all();
        return view('combo.create')->with('data', $data);
    }

    public function save(Request $request)
    {
        Combo::validate($request);

        $input = $request->all();
        
        if ($request->hasFile('urlImg')) {
            $destination_path = '/public/img/combos';
            $image = $request->file('urlImg');
            $image_name=$image->getClientOriginalName();
            $path = $request->file('urlImg')->storeAs($destination_path, $image_name);
        
            $input['urlImg'] = $image_name;

        }


        Combo::create($input);
        $lastCombo = Combo::latest('created_at')->first();
        $flowers = [];
        $idFlower1 = Flower::where("name", $request["flower1"])->get();
        $idFlower2 = Flower::where("name", $request["flower2"])->get();
        $idFlower3 = Flower::where("name", $request["flower3"])->get();
        array_push($flowers, $idFlower1[0], $idFlower2[0], $idFlower3[0]);
        foreach ($flowers as $flower) {
            $comboFlower = new ComboFlower();
            $comboFlower->setFlowerId($flower->getId());
            $comboFlower->setComboId($lastCombo->getId());
            $comboFlower->save();
        } 
        
        $candies = [];
        $idCandy1 = Candy::where("name", $request["candy1"])->get();
        $idCandy2 = Candy::where("name", $request["candy2"])->get();
        $idCandy3 = Candy::where("name", $request["candy3"])->get();
        array_push($candies, $idCandy1[0], $idCandy2[0], $idCandy3[0]);
        
        foreach ($candies as $candy) {
            $comboCandy = new ComboCandy();
            $comboCandy->setCandyId($candy->getId());
            $comboCandy->setComboId($lastCombo->getId());
            $comboCandy->save();
        }

        return back()->with('success', 'Item updated successfully!');
    }
    public function show($id)
    {
        $data = [];
        $data['combo'] = Combo::findOrFail($id);
        $data['flowers'] = $data['combo']->flowers()->get();
        $data['candies'] = $data['combo']->candies()->get();
        return view('combo.show')->with('data', $data);
    }

    public function edit($id)
    {
        $data = [];
        $data['combo'] = Combo::findOrFail($id);
        $data['flowers'] = Flower::all();
        $data['candies'] = $data['combo']->candies()->get();
        return view('combo.edit')->with('data', $data);
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
        $idFlower1 = Flower::where("name", $request["flower1"])->get();
        $idFlower2 = Flower::where("name", $request["flower2"])->get();
        $idFlower3 = Flower::where("name", $request["flower3"])->get();
        $comboFlower = ComboFlower::where("combo_id", $request->id)->get();
        $itemToSave = $comboFlower[0];
        $itemToSave->setFlowerId($idFlower1[0]->getId());
        $itemToSave->save();        
        $itemToSave = $comboFlower[1];
        $itemToSave->setFlowerId($idFlower2[0]->getId());
        $itemToSave->save();        
        $itemToSave = $comboFlower[2];
        $itemToSave->setFlowerId($idFlower3[0]->getId());
        $itemToSave->save();        
        return back()->with('success', 'Item updated successfully!');
    }

    public function delete($id)
    {
        Combo::Where('id', $id)->delete();
        return redirect()->route('combo.index')->with('success', 'El producto se elimin?? exitosamente!');
    }

}
