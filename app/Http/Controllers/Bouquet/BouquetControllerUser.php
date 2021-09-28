<?php

namespace App\Http\Controllers\Bouquet;
use App\Http\Controllers\Controller;
use App\Models\Bouquet;
use App\Models\Candy;

class BouquetControllerUser extends Controller
{
    public function index()
    {
        $data = [];
        $data = Bouquet::all();
        $candies = Candy::all();
        return view('bouquet.index')->with("data", $data)->with("candies", $candies);
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


}
