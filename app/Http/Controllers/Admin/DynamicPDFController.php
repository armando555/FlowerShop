<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Bouquet;
use App\Models\BouquetFlower;
use App\Models\Candy;
use App\Models\Combo;
use App\Models\Flower;
use App\Models\User;
use App\Models\Item;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Symfony\Component\VarDumper\Cloner\Data;

class DynamicPDFController extends Controller
{
    public static function index(){
        $items = Item:: all();
    }
}
