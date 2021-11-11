<?php

namespace App\Http\Controllers\Candy;
use App\Http\Controllers\Controller;
use App\Models\Candy;



class CandyController extends Controller
{


    public function index()
    {
        $data = [];
        $data['candies'] = Candy::all();
        return view('candy.userindex')->with('data', $data);
    }

    public function show($id)
    {
        $data = [];
        $data['candy'] = Candy::findOrFail($id);
        return view('candy.usershow')->with('data', $data);
    }


}
