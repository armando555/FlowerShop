<?php

namespace App\Http\Controllers;
use App\Models\Combo;



class CombosController extends Controller {
    
    public function combos(){
        $data = [];
        $data["title"] = "Combos";
        
        $data["combos"] = Combo::orderBy('id','desc')->get();
        return view('combos.list')->with("data",$data);

    }

    public function showCombo($id) {
        $data = Combo::findOrFail($id);
        return view('combos.show')->with("data",$data);
    }
    
    public function deleteCombo($id) {
        $combo = Combo::findOrFail($id);
        $combo->delete();
        return view('home.index');
    }
}
