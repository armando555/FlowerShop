<?php

namespace App\Http\Controllers\Bouquet;
use App\Http\Controllers\Controller;
use App\Models\Bouquet;
use App\Models\Candy;

class BouquetController extends Controller
{
    public function index()
    {
        $data = [];
        $data['bouquet'] = Bouquet::all();
        $data['candies'] = Candy::all();
        return view('bouquet.userindex')->with("data", $data);
    }

    public function home()
    {
        return redirect()->route('bouquet.index');
    }

    public function show($id)
    {
        $data = [];
        
        $data['bouquet'] = Bouquet::findOrFail($id);
        $data['flowers'] = $data['bouquet']->flowers()->get();
        $data['candies'] = $data['bouquet']->candies()->get();
        return view('bouquet.userShow')->with("data", $data);
    }


}
