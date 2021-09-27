<?php

namespace App\Http\Controllers\Combo;
use App\Http\Controllers\Controller;
use App\Models\Combo;
use App\Models\Flower;
use App\Models\ComboFlower;
use Illuminate\Http\Request;


class ComboController extends Controller
{


    public function index()
    {
        $data = [];
        $data = Combo::all();
        return view('combo.index')->with('data', $data);
    }

    public function create()
    {
        $data = [];
        $data = Flower::all();
        return view('combo.create')->with('data',$data);
    }

    public function save(Request $request)
    {
        Combo::validate($request);
        Combo::create($request->only(["name", "bouquetType", "rate", "price", "urlImg"]));
        $lastCombo = Combo::latest('created_at')->first();
        $flowers = [];
        $idFlower1 = Flower::where("name",$request["flower1"])->get();
        $idFlower2 = Flower::where("name",$request["flower2"])->get();
        $idFlower3 = Flower::where("name",$request["flower3"])->get();
        array_push($flowers,$idFlower1[0],$idFlower2[0],$idFlower3[0]);
        foreach ($flowers as $flower) {
            $comboFlower = new ComboFlower();
            $comboFlower->setFlowerId($flower->getId());
            $comboFlower->setComboId($lastCombo->getId());
            $comboFlower->save();
        }       
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
        $flowers = Flower::all();
        return view('combo.edit')->with('data', $combo)->with("flowers",$flowers);
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
        $idFlower1 = Flower::where("name",$request["flower1"])->get();
        $idFlower2 = Flower::where("name",$request["flower2"])->get();
        $idFlower3 = Flower::where("name",$request["flower3"])->get();
        $comboFlower = ComboFlower::where("combo_id",$request->id)->get();
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

}
