<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Bouquet;
use App\Models\BouquetFlower;
use App\Models\Candy;
use App\Models\Combo;
use App\Models\Flower;
use App\Models\User;
use App\Models\Item;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class PanelController extends Controller
{
    public function index(Request $request){
        $users = User::all();
        $flowers = Flower::all();
        $bouquets = Bouquet::all();
        $combos = Combo::all();
        $candies = Candy::all();
        $mostProductSold = $this->mostProductSold();
        return view("adminPanel.panel")->with("flowers",$flowers)->with("bouquets",$bouquets)->with("combos",$combos)->with("candies",$candies)->with("users",$users)->with("mostProductSold",$mostProductSold);
    }
    public function mostProductSold(){
        $item = Item::max('amount');
        $product = Item::where('amount',$item)->get();
        $data = "No hay productos";
        if($product[0]->getType() == "candy"){
            $data=Candy::findOrFail($product[0]->getCandyId());
            $data = $data->getName();
        }
        if($product[0]->getType() == "flower"){
            $data=Flower::findOrFail($product[0]->getFlowerId());
            $data = $data->getName();
        }
        if($product[0]->getType() == "bouquet"){
            $data=Bouquet::findOrFail($product[0]->getBouquetId());
            $data = $data->getName();
        }
        if($product[0]->getType() == "combo"){
            $data=Combo::findOrFail($product[0]->getComboId());
            $data = $data->getName();
        }
        
        //dd($product[0]);
        return $data;
    }
    public function searchProducts(Request $request){
        $term = $request->get('texto');
        $querys1 = Flower::where("name",'LIKE','%'.$term.'%')->get();
        $querys2 = Bouquet::where("name",'LIKE','%'.$term.'%')->get();
        $querys3 = Combo::where("name",'LIKE','%'.$term.'%')->get();
        $querys4 = Candy::where("name",'LIKE','%'.$term.'%')->get();
        $data = [];
        foreach ($querys1 as $query ) {
            $data[] = [
                'label' => $query->name
            ];
        }
        foreach ($querys2 as $query ) {
            $data[] = [
                'label' => $query->name
            ];
        }
        foreach ($querys3 as $query ) {
            $data[] = [
                'label' => $query->name
            ];
        }
        foreach ($querys4 as $query ) {
            $data[] = [
                'label' => $query->name
            ];
        }
        return $data;
    }
}
