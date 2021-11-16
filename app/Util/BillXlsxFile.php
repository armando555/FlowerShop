<?php

namespace App\Util;

use App\Interfaces\BillFile;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;

class BillXlsxFile implements BillFile
{

    public function generate($id, Request $request)
    {
        return Excel::download(new OrdersExport, 'users.xlsx');
    }

}
