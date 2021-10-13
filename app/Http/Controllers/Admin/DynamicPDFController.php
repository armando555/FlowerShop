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
use App\Models\Order;
use PDF;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Symfony\Component\VarDumper\Cloner\Data;

class DynamicPDFController extends Controller
{
    public static function index()
    {
        $items = Item::all();
    }
    public function generatePdf($id, Request $request)
    {
        
        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($this->convert_data_to_html($id));
        return $pdf->download('factura.pdf');
    }
    public function convert_data_to_html($id)
    {
        $data= Order::where("id", $id)->get();
        $order = $data[0];
        $items = $order->items()->get();
        $user = $order->user()->get();
        //dd($order->getTotal());
        $output = '
        <h1 align="center">Flower Shop</h1>
        <h2># '.__('messages.bill').'</h2>
        <h2>'.$order->getId().'</h2>
        <h2>'.__('messages.name').'</h2>
        <h2>'.$user[0]->getName().'</h2>
        <table width="100%" style="border-collapse:collapse;border:0px;">
            <tr>
                <th style="border:1px solid;padding:12px;" width=20%>'.__('messages.name').'</th>
                <th style="border:1px solid;padding:12px;" width=20%>'.__('messages.type').'</th>
                <th style="border:1px solid;padding:12px;" width=20%>'.__('messages.price').'</th>
                <th style="border:1px solid;padding:12px;" width=20%>'.__('messages.quantity').'</th>
                <th style="border:1px solid;padding:12px;" width=20%>Subtotal</th>
            </tr>';
        foreach ($items as $item) {
            if($item->getType() == "flower") {
                $flower = $item->flower()->get();
                $output.='
                        <tr>
                            <td>'.$flower[0]->getName().'</td>
                            <td>'.$item->getType().'</td>
                            <td>'.$flower[0]->getprice().'</td>
                            <td>'.$item->getAmount().'</td>
                            <td>'.$item->getSubtotal().'</td>
                        </tr>';
            }
            if($item->getType() == "bouquet") {
                $bouquet = $item->bouquet()->get();
                $output.='
                        <tr>
                            <td>'.$bouquet[0]->getName().'</td>
                            <td>'.$item->getType().'</td>
                            <td>'.$bouquet[0]->getPrice().'</td>
                            <td>'.$item->getAmount().'</td>
                            <td>'.$item->getSubtotal().'</td>
                        </tr>';
            }
            if($item->getType() == "combo") {
                $combo = $item->combo()->get();
                $output.='
                        <tr>
                            <td>'.$combo[0]->getName().'</td>
                            <td>'.$item->getType().'</td>
                            <td>'.$combo[0]->getPrice().'</td>
                            <td>'.$item->getAmount().'</td>
                            <td>'.$item->getSubtotal().'</td>
                        </tr>';
            }
            if($item->getType() == "candy") {
                $combo = $item->candy()->get();
                $output.='
                        <tr>
                            <td>'.$combo[0]->getName().'</td>
                            <td>'.$item->getType().'</td>
                            <td>'.$combo[0]->getPrice().'</td>
                            <td>'.$item->getAmount().'</td>
                            <td>'.$item->getSubtotal().'</td>
                        </tr>';
            }
                
        }            
            $output.='</table>';
            $output.='<h1>'.__('messages.total').'</h1>'.$order->getTotal();
        return $output;
    }
}
