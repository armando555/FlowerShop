<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Bouquet;
use App\Models\Combo;
use App\Models\Flower;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addFlower($id,Request $request)
    {
        $flowers = $request->session()->get("flowers");
        $flowers [$id] = $id;
        $quantityFlower = $request->session()->get("quantityFlower");
        $quantityFlower[$id] = $request["quantity"];
        $request->session()->put('quantityFlower',$quantityFlower);
        $request->session()->put('flowers', $flowers);
        //dd($flowers,$quantityFlower);
        return back();
    }
    public function save( Request $request){
        $products = [];
        $idFlowers = $request->session()->get('flowers');
        $idBouquets = $request->session()->get('bouquets');
        $idCombos = $request->session()->get('combos');
        $quantityFlower =$request->session()->get('quantityFlower');
        $quantityBouquet = $request->session()->get('quantityBouquet');
        $quantityCombo = $request->session()->get('quantityCombo');
        dd($idFlowers,$quantityFlower,$idBouquets,$quantityBouquet,$idCombos,$quantityCombo);
    }
    public function show(Request $request)
    {
        $products = [];
        $idFlowers = $request->session()->get('flowers');
        $idBouquets = $request->session()->get('bouquets');
        $idCombos = $request->session()->get('combos');
        $quantityFlower =$request->session()->get('quantityFlower');
        $quantityBouquet = $request->session()->get('quantityBouquet');
        $quantityCombo = $request->session()->get('quantityCombo');
        //dd($idFlowers,$quantityFlower);
        if(gettype($idFlowers) == "array") {
            $products["flowers"] = Flower::find(array_values($idFlowers));
        }
        if(gettype($idBouquets) == "array") {
            $products["bouquets"] = Bouquet::find(array_values($idBouquets));
        }
        if(gettype($idCombos) == "array") {
            $products["combos"] = Combo::find(array_values($idCombos));
        }
        return view('cart.index')->with("data", $products)->with("quantityFlower",$quantityFlower)->with("quantityBouquet",$quantityBouquet)->with("quantityCombo",$quantityCombo);
        //dd($products);
    }
    public function addCandies($id,Request $request)
    {
        $candies = $request->session()->get("candies");
        $candies [$id] = $id;
        $quantityCandy = $request->session()->get("quantityCandy");
        $quantityCandy[$id] = $request["quantity"];
        $request->session()->put('quantityCandy',$quantityCandy);
        $request->session()->put('candies', $candies);
        return back();
    }
    public function addBouquet($id,Request $request)
    {
        $bouquets = $request->session()->get("bouquets");
        $bouquets [$id] = $id;
        $quantityBouquet = $request->session()->get("quantityBouquet");
        $quantityBouquet[$id] = $request["quantity"];
        $request->session()->put('quantityBouquet',$quantityBouquet);
        $request->session()->put('bouquets', $bouquets);
        return back();
    }
    public function addCombo($id,Request $request)
    {
        $combos = $request->session()->get("combos");
        $combos [$id] = $id;
        $quantityCombo = $request->session()->get("quantityCombo");
        $quantityCombo[$id] = $request["quantity"];
        $request->session()->put('quantityCombo',$quantityCombo);
        $request->session()->put('combos', $combos);
        return back();
    }
    public function deleteFlowers(Request $request)
    {
        $request->session()->forget('flowers');
        return back();
    }
    public function deleteBouquets(Request $request)
    {
        $request->session()->forget('bouquets');
        return back();
    }
    public function deleteCombos(Request $request)
    {
        $request->session()->forget('combos');
        return back();
    }
    public function deleteCandies(Request $request)
    {
        $request->session()->forget('candies');
        return back();
    }
    public function deleteAll(Request $request)
    {
        $request->session()->forget('flowers');
        $request->session()->forget('bouquets');
        $request->session()->forget('combos');
        $request->session()->forget('candies');
        $request->session()->forget('quantityFlower');
        $request->session()->forget('quantityBouquet');
        $request->session()->forget('quantityCombo');
        return back();
    }
}
