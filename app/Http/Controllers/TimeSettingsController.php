<?php

namespace App\Http\Controllers;

use App\Models\EduWeek;
use App\Models\EduYear;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TimeSettingsController extends Controller
{
    public function index()
    {
        $active_year = Session::get('edu_year')->id ?? 1;

        $weeks = EduWeek::where('edu_year_id', $active_year)->get();

        $year = EduYear::find($active_year);

        return view('time-settings.index', compact('weeks', 'year'));
    }

    public function create()
    {
        return view('time-settings.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'weeks_count' => 'required|numeric',
        ]);


        // create year
        $edu_year = new EduYear();
        $edu_year->name = $request->get('name');
        $edu_year->save();

        // create edu_week
        $start_date = Carbon::parse($request->get('start_date'));
        for($a = 1; $a <= $request->get('weeks_count'); $a++)
        {
            $week = ['edu_year_id' => $edu_year->id, 'number' => $a, 'start_date' => $start_date, 'edu_week_type_id' => 1 ];
            DB::table('edu_week')->insert($week);

            $start_date = Carbon::parse($start_date)->addWeek();
        }

        return back()->with(['message' => 'Mācību gads izveidots!']);
    }

}
