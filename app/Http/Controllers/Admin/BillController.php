<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\BillFile;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;


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
    public function generateXlsx($id, Request $request){
        return Excel::download(new OrdersExport, 'users.xlsx');
    }

}
