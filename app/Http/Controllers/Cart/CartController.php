<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Bouquet;
use App\Models\Combo;
use App\Models\Flower;
use App\Models\Order;
use App\Models\Item;
use App\Models\Candy;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class CartController extends Controller
{
    public function addFlower($id,Request $request)
    {
        $flowers = $request->session()->get("flowers");
        $flowers [$id] = $id;
        $quantityFlower = $request->session()->get("quantityFlower");
        $quantityFlower[$id] = $request["quantity"];
        $request->session()->put('quantityFlower', $quantityFlower);
        $request->session()->put('flowers', $flowers);
        //dd($flowers,$quantityFlower);
        return back();
    }
    public function addCandy($id,Request $request)
    {
        $candies = $request->session()->get("candies");
        $candies [$id] = $id;
        $quantityCandy = $request->session()->get("quantityCandy");
        $quantityCandy[$id] = $request["quantity"];
        $request->session()->put('quantityCandy', $quantityCandy);
        $request->session()->put('candies', $candies);
        //dd($flowers,$quantityFlower);
        return back();
    }
    public function buy( Request $request)
    {
        $idFlowers = $request->session()->get('flowers');
        $idBouquets = $request->session()->get('bouquets');
        $idCombos = $request->session()->get('combos');
        $idCandies = $request->session()->get('candies');
        $quantityFlower =$request->session()->get('quantityFlower');
        $quantityBouquet = $request->session()->get('quantityBouquet');
        $quantityCombo = $request->session()->get('quantityCombo');
        $quantityCandy = $request->session()->get('quantityCandy');
        $total = 0;
        if(!is_null($idFlowers) || !is_null($idBouquets) || !is_null($idCombos)|| !is_null($idCandies)) {
            $order = new Order();
            $order->setTotal(0);
            $order->setUserId(auth()->user()->id);
            $order->save();            
            if(!is_null($idFlowers)) {
                $flowers = Flower::find(array_values($idFlowers));
                foreach ($flowers as $flower) {
                    $item = new Item();
                    $item->setOrderId($order->getId());
                    $item->setType("flower");
                    $item->setFlowerId($flower->getId());
                    $item->setSubtotal($flower->getPrice()*$quantityFlower[$flower->getId()]);
                    $item->setDiscount(0);
                    $item->setAmount($quantityFlower[$flower->getId()]);
                    $total += $flower->getPrice()*$quantityFlower[$flower->getId()];
                    $item->save();
                }
            }
            if(!is_null($idBouquets)) {
                $bouquets = Bouquet::find(array_values($idBouquets));
                foreach ($bouquets as $bouquet) {
                    $item = new Item();
                    $item->setOrderId($order->getId());
                    $item->setBouquetId($bouquet->getId());
                    $item->setType("bouquet");
                    $item->setSubtotal($bouquet->getPrice()*$quantityBouquet[$bouquet->getId()]);
                    $item->setDiscount(0);
                    $item->setAmount($quantityBouquet[$bouquet->getId()]);
                    $total += $bouquet->getPrice()*$quantityBouquet[$bouquet->getId()];
                    $item->save();
                }
            }
            if(!is_null($idCombos)) {
                $combos = Combo::find(array_values($idCombos));
                foreach ($combos as $combo) {
                    $item = new Item();
                    $item->setOrderId($order->getId());
                    $item->setComboId($combo->getId());
                    $item->setType("combo");
                    $item->setAmount($quantityCombo[$combo->getId()]);
                    $item->setSubtotal($combo->getPrice()*$quantityCombo[$combo->getId()]);
                    $item->setDiscount(0);
                    $total += $combo->getPrice()*$quantityCombo[$combo->getId()];
                    $item->save();
                }
            }
            if(!is_null($idCandies)) {
                $candies = Candy::find(array_values($idCandies));
                foreach ($candies as $candy) {
                    $item = new Item();
                    $item->setOrderId($order->getId());
                    $item->setCandyId($candy->getId());
                    $item->setType("candy");
                    $item->setAmount($quantityCandy[$candy->getId()]);
                    $item->setSubtotal($candy->getPrice()*$quantityCandy[$candy->getId()]);
                    $item->setDiscount(0);
                    $total += $candy->getPrice()*$quantityCandy[$candy->getId()];
                    $item->save();
                }
            }
            $order->setTotal($total);
            $order->save();
            $items = $order->items()->get();
            $user = $order->user()->get();
        }        
        return view("cart.generatePdf")->with("order",$order)->with("items",$items)->with("user",$user[0]);
    }
    public function show(Request $request)
    {
        $products = [];
        $idFlowers = $request->session()->get('flowers');
        $idBouquets = $request->session()->get('bouquets');
        $idCombos = $request->session()->get('combos');
        $idCandies = $request->session()->get('candies');
        $quantityFlower =$request->session()->get('quantityFlower');
        $quantityBouquet = $request->session()->get('quantityBouquet');
        $quantityCombo = $request->session()->get('quantityCombo');
        $quantityCandy= $request->session()->get('quantityCandy');
        $acu = 0;
        if(!is_null($quantityCandy)) {
            foreach (array_keys($quantityCandy) as $id) {
                $obj = Candy::findOrFail($id);
                $acu = $acu + $obj->getPrice() * $quantityCandy[$id];
            }
        }
        if(!is_null($quantityFlower)) {
            foreach (array_keys($quantityFlower) as $id) {
                $obj = Flower::findOrFail($id);
                $acu = $acu + $obj->getPrice() * $quantityFlower[$id];
            }
        }
        if(!is_null($quantityBouquet)) {
            foreach (array_keys($quantityBouquet) as $id) {
                $obj = Bouquet::findOrFail($id);
                $acu = $acu + $obj->getPrice() * $quantityBouquet[$id];
            }
        }
        if(!is_null($quantityCombo)) {
            foreach (array_keys($quantityCombo) as $id) {
                $obj = Combo::findOrFail($id);
                $acu = $acu + $obj->getPrice() * $quantityCombo[$id];
            }
        }        
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
        if(gettype($idCandies) == "array") {
            $products["candies"] = Candy::find(array_values($idCandies));
        }
        return view('cart.index')->with("data", $products)->with("quantityFlower", $quantityFlower)->with("quantityBouquet", $quantityBouquet)->with("quantityCombo", $quantityCombo)->with("acu", $acu)->with("quantityCandy",$quantityCandy);
        //dd($products);
    }
    public function addCandies($id,Request $request)
    {
        $candies = $request->session()->get("candies");
        $candies [$id] = $id;
        $quantityCandy = $request->session()->get("quantityCandy");
        $quantityCandy[$id] = $request["quantity"];
        $request->session()->put('quantityCandy', $quantityCandy);
        $request->session()->put('candies', $candies);
        return back();
    }
    public function addBouquet($id,Request $request)
    {
        $bouquets = $request->session()->get("bouquets");
        $bouquets [$id] = $id;
        $quantityBouquet = $request->session()->get("quantityBouquet");
        $quantityBouquet[$id] = $request["quantity"];
        $request->session()->put('quantityBouquet', $quantityBouquet);
        $request->session()->put('bouquets', $bouquets);
        return back();
    }
    public function addCombo($id,Request $request)
    {
        $combos = $request->session()->get("combos");
        $combos [$id] = $id;
        $quantityCombo = $request->session()->get("quantityCombo");
        $quantityCombo[$id] = $request["quantity"];
        $request->session()->put('quantityCombo', $quantityCombo);
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
