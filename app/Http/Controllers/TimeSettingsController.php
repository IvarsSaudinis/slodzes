<?php

namespace App\Http\Controllers;

use App\Models\EduWeek;
use App\Models\EduYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TimeSettingsController extends Controller
{
    public function index()
    {
        $active_year = Session::get('edu_year', 1)->id;

        $weeks = EduWeek::where('edu_year_id', $active_year)->get();

        $year = EduYear::find($active_year);

        return view('time-settings.index', compact('weeks', 'year'));
    }
}
