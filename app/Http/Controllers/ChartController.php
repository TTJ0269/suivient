<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use App\Models\Activite;

class ChartController extends Controller
{
    /*public function PieChart()
    {
        $chart = (new LarapexChart)->pieChart()
        ->setTitle('Users')
        ->setSubtitle('Season 2021.')
        ->addData([40, 50, 30, 20, 70])
        ->setLabels(['Player 7', 'Player 10', 'Player 9', 'Player 12', 'Player 15']);
        return view('charts.sample', compact('chart'));
    }*/

    public function DonutChart()
    {
        return view ('charts.donut');
    }

   /* public function RadialChart()
    {
        $chart = (new LarapexChart)->radialChart()
        ->setTitle('Passing effectiveness.')
        ->setSubtitle('Barcelona city vs Madrid sports.')
        ->addData([75, 60])
        ->setLabels(['Barcelona city', 'Madrid sports'])
        ->setColors(['#D32F2F', '#03A9F4']);
        return view ('charts.radial', compact('chart'));
    }

    public function LineChart()
    {
        $chart = (new LarapexChart)->lineChart()
        ->setTitle('Sales during 2021.')
        ->setSubtitle('Physical sales vs Digital sales.')
        ->addData('Physical sales', [40, 93, 35, 42, 18, 82])
        ->addData('Digital sales', [70, 29, 77, 28, 55, 45])
        ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
        return view ('charts.line', compact('chart'));
    }

    public function AreaChart()
    {
        $chart = (new LarapexChart)->areaChart()
        ->setTitle('Sales during 2021.')
        ->setSubtitle('Physical sales vs Digital sales.')
        ->addData('Physical sales', [40, 93, 35, 42, 18, 82])
        ->addData('Digital sales', [70, 29, 77, 28, 55, 45])
        ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
        return view ('charts.area', compact('chart'));
    }

    public function BarChart()
    {
        $chart = (new LarapexChart)->barChart()
        ->setTitle('San Francisco vs Boston.')
        ->setSubtitle('Wins during season 2021.')
        ->addData('San Francisco', [6, 9, 3, 4, 10, 8])
        ->addData('Boston', [7, 3, 8, 2, 6, 4])
        ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
        return view ('charts.bar', compact('chart'));
    }

    public function RadarChart()
    {
        $chart = (new LarapexChart)->radarChart()
        ->setTitle('Individual Player Stats.')
        ->setSubtitle('Season 2021.')
        ->addData('Stats', [70, 93, 78, 97, 50, 90])
        ->setXAxis(['Pass', 'Dribble', 'Shot', 'Stamina', 'Long shots', 'Tactical'])
        ->setMarkers(['#303F9F'], 7, 10);
        return view ('charts.radar', compact('chart'));
    }*/
}
