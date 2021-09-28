<?php

namespace App\Http\Controllers\Bouquet;
use App\Http\Controllers\Controller;
use App\Models\Bouquet;

class BouquetControllerUser extends Controller
{
    public function index()
    {
        $data = [];
        $data = Bouquet::all();
        return view('bouquet.userindex')->with("data", $data);
    }

    public function home()
    {
        return redirect()->route('bouquet.userindex');
    }

    public function show($id)
    {
        $bouquet = Bouquet::findOrFail($id);
        $flowers = $bouquet->flowers()->get();
        return view('bouquet.usershow')->with("data", $bouquet)->with("flowers", $flowers);
    }

}
