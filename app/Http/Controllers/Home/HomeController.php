<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //if(auth()->user()->role == 'Admin')
        return view('home.index');
    }

    public function home()
    {
        return redirect()->route('home.index');
    }

    public function languageDemo()
    {
        return view('home.languageDemo');
    }
}
