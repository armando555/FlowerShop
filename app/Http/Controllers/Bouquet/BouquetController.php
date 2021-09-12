<?php

namespace App\Http\Controllers\Bouquet;
use App\Http\Controllers\Controller;
use App\Models\Bouquet;
use Illuminate\Http\Request;

class BouquetController extends Controller
{
    public function index()
    {
        $data = [];
        $data = Bouquet::all();
        return view('bouquet.index')->with("data",$data);
    }
}
