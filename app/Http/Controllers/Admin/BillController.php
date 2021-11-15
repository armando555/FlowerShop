<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\BillFile;
use App\Models\Bouquet;
use App\Models\BouquetFlower;
use App\Models\Candy;
use App\Models\Combo;
use App\Models\Flower;
use App\Models\User;
use App\Models\Item;
use App\Models\Order;
use PDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Symfony\Component\VarDumper\Cloner\Data;

class BillController extends Controller
{
    public static function index()
    {
        $items = Item::all();
    }
    public function generatePdf($id, Request $request)
    {
        $billInterface = app(BillFile::class);

        return $billInterface->generate($id,$request);

        
    }
}
