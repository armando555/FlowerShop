<?php

namespace App\Http\Controllers\Combo;
use App\Http\Controllers\Controller;
use App\Models\Combo;



class ComboController extends Controller
{


    public function index()
    {
        $data = [];
        $data['combos'] = Combo::all();
        return view('combo.userindex')->with('data', $data);
    }

    public function show($id)
    {
        $data = [];
        $data['combo'] = Combo::findOrFail($id);
        $data['flowers'] = $data['combo']->flowers()->get();
        $data['candies'] = $data['combo']->candies()->get();
        return view('combo.usershow')->with('data', $data);
    }
}
