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
        $data["bouquets"] = Bouquet::all();
        $data["candies"] = Candy::all();
        return view('bouquet.index')->with("data", $data);
    }

    public function home()
    {
        return redirect()->route('bouquet.index');
    }

    public function show($id)
    {
        $data = [];
        $bouquet = Bouquet::findOrFail($id);
        $data['bouquet'] = $bouquet;
        $data['flowers'] = $bouquet->flowers()->get();
        $data['candies'] = $bouquet->candies()->get();
        return view('bouquet.show')->with("data", $data);
    }


}
