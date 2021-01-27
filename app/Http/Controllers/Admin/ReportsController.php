<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function index()
    {

        $meetings = DB::table('meetings')
            ->select('mentor_id', DB::raw('count(*) as total'))
            ->groupBy('mentor_id')
            ->pluck('total', 'mentor_id')->all(); // gets no appointments per mentor


        $mentor_names = [];
        foreach ($meetings as $key => $value)
        {
            array_push($mentor_names, User::find($key)->name);
        }

        $chart_data = new Chart();
        $chart_data->labels = array_values($mentor_names);
        $chart_data->data = array_values($meetings);

        return view('mentor.reports.index', [
            'chart_data' => $chart_data
        ]);
    }
}
