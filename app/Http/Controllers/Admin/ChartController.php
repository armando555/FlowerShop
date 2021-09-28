<?php 
namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        /*
        $user        = User::first();
        $userTwo     = User::find(2);
        $todosDone   = Todo::where('user_id', $user->id)->whereStatus(true)->count();
        $todosNotYet = Todo::where('user_id', $user->id)->whereStatus(false)->count();
        */
        
        $chart = LarapexChart::setTitle('Prueba')
            ->setLabels(['Flowers', 'Combos','Bouquets'])
            ->setDataset([5, 10,50,20]);


        return view('chart', compact('chart'));//*/
    }


}