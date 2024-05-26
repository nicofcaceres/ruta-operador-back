<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use App\Models\Route;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;
use SoapBox\Formatter\Formatter;

class ReportsController extends Controller
{
    /**
     * Display a listing of the journeys by day.
     */
    public function journeys(Request $request): View
    {
        $now = Carbon::now()->format('Y-m-d');
        $dateFilter = $request->get('filter-date', $now);

        $journeys = Journey::where(DB::raw("(DATE_FORMAT(start_at,'%Y-%m-%d'))"), "=", $dateFilter)->paginate(10);

        return view('report-x-days',[
            'journeys' => $journeys,
            'dateFilter' => $dateFilter
        ]);
    }

    public function journeysCsv(Request $request,string $filter_date)
    {
        $journeys = Journey::where(DB::raw("(DATE_FORMAT(start_at,'%Y-%m-%d'))"), "=", $filter_date)->get();
        $this->exportArry($journeys->toArray(),'reporte-rutas-x-dia');
        return;
    }
    /**
     * Display a listing of the journeys by day.
     */
    public function byTechnical(Request $request): View
    {
        $now = Carbon::now()->format('Y-m-d');
        $dateFilter = $request->get('filter-date', $now);

        $firstUser = User::where('is_technical',1)->first();
        $userid = $request->get('technical', $firstUser->id);
        $technicals = User::where('is_technical',1)->get();

        $journeys = Journey::where(DB::raw("(DATE_FORMAT(start_at,'%Y-%m-%d'))"), "=", $dateFilter)
            ->where('technical_id', $userid)->paginate(10);

        $locations = Route::where(DB::raw("(DATE_FORMAT(location_time,'%Y-%m-%d'))"), "=", $dateFilter)->where('technical_id', $userid)->get()->toJson();
        
        return view('report-x-technical',[
            'journeys' => $journeys,
            'userid' => $userid,
            'technicals' => $technicals,
            'dateFilter' => $dateFilter,
            'locations' => $locations
        ]);
    }

    /**
     * Display a listing of the journeys by day.
     */
    public function byTechnicalCsv(Request $request)
    {
        $now = Carbon::now()->format('Y-m-d');
        $dateFilter = $request->get('filter-date', $now);

        $firstUser = User::where('is_technical',1)->first();
        $userid = $request->get('technical', $firstUser->id);

        $journeys = Journey::where(DB::raw("(DATE_FORMAT(start_at,'%Y-%m-%d'))"), "=", $dateFilter)
            ->where('technical_id', $userid)->get();
        $this->exportArry($journeys->toArray(),'reporte-rutas-x-tecnico');

        return;
    }

    private function exportArry(array $entitiesArray, string $nameFile){

        $formatter = Formatter::make($entitiesArray, Formatter::ARR);
      
        $csv = $formatter->toCsv();
      
        header('Content-Disposition: attachment; filename="'.$nameFile.'_'.time().'.csv"');
        header("Cache-control: private");
        header("Content-type: application/force-download");
        header("Content-transfer-encoding: binary\n");
      
        echo $csv;
    
        exit;
    }
}
