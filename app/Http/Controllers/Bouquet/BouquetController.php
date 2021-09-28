<?php

namespace App\Http\Controllers\Bouquet;
use App\Http\Controllers\Controller;
use App\Models\Bouquet;
use App\Models\BouquetFlower;
use App\Models\Flower;
use App\Models\Candy;
use App\Models\BouquetCandy;
use Illuminate\Http\Request;

class BouquetController extends Controller
{
    public function index()
    {
        $data = [];
        $data = Bouquet::all();
        $candies = Candy::all();
        return view('bouquet.index')->with("data", $data)->with("candies",$candies);
    }

    public function home()
    {
        return redirect()->route('bouquet.index');
    }

    public function show($id)
    {
        $bouquet = Bouquet::findOrFail($id);
        $flowers = $bouquet->flowers()->get();
        $candies = $bouquet->candies()->get();
        return view('bouquet.show')->with("data", $bouquet)->with("flowers", $flowers)->with("candies", $candies);
    }

    public function edit($id)
    {
        $bouquet = Bouquet::findOrFail($id);
        $flowers = Flower::all();
        $candies = Candy::all();
        return view('bouquet.edit')->with("data", $bouquet)->with("flowers", $flowers)->with("candies",$candies);
    }

    public function create()
    {
        $data = [];
        $data = Flower::all();
        $candies = Candy::all();
        return view('bouquet.create')->with('data', $data)->with("candies", $candies);
        
    }

    public function save(Request $request)
    {
        Bouquet::validate($request);

        $input = $request->all();
        
        if ($request->hasFile('urlImg'))
        {
            
            $destination_path = '/public/img/combos';
            $image = $request->file('urlImg');
            $image_name=$image->getClientOriginalName();
            $path = $request->file('urlImg')->storeAs($destination_path,$image_name);
        
            $input['urlImg'] = $image_name;

        }



        Bouquet::create($input);
        $lastBouquet = Bouquet::latest('created_at')->first();
        $flowers = [];
        $idFlower1 = Flower::where("name", $request["flower1"])->get();
        $idFlower2 = Flower::where("name", $request["flower2"])->get();
        $idFlower3 = Flower::where("name", $request["flower3"])->get();
        array_push($flowers, $idFlower1[0], $idFlower2[0], $idFlower3[0]);
        foreach ($flowers as $flower) {
            $bouquetFlower = new BouquetFlower();
            $bouquetFlower->setFlowerId($flower->getId());
            $bouquetFlower->setBouquetId($lastBouquet->getId());
            $bouquetFlower->save();
        }


        $candys = [];
        $idCandy1 = Candy::where("name", $request["candy1"])->get();
        $idCandy2 = Candy::where("name", $request["candy2"])->get();
        $idCandy3 = Candy::where("name", $request["candy3"])->get();
        array_push($candys, $idCandy1[0], $idCandy2[0], $idCandy3[0]);
        foreach ($candys as $candy) {
            $bouquetCandy = new BouquetCandy();
            $bouquetCandy->setCandyId($candy->getId());
            $bouquetCandy->setBouquetId($lastBouquet->getId());
            $bouquetCandy->save();
        }



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
        $idFlower1 = Flower::where("name", $request["flower1"])->get();
        $idFlower2 = Flower::where("name", $request["flower2"])->get();
        $idFlower3 = Flower::where("name", $request["flower3"])->get();
        $bouquetFlower = BouquetFlower::where("bouquet_id", $request->id)->get();
        $itemToSave = $bouquetFlower[0];
        $itemToSave->setFlowerId($idFlower1[0]->getId());
        $itemToSave->save();        
        $itemToSave = $bouquetFlower[1];
        $itemToSave->setFlowerId($idFlower2[0]->getId());
        $itemToSave->save();        
        $itemToSave = $bouquetFlower[2];
        $itemToSave->setFlowerId($idFlower3[0]->getId());
        $itemToSave->save();
        return back()->with('success', 'Item updated successfully!');
    }

    public function delete($id)
    {
        Bouquet::Where('id',$id)->delete();
        return redirect()->route('bouquet.index')->with('success','El producto se eliminó exitosamente!');
    }

}
