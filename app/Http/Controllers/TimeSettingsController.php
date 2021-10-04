<?php

namespace App\Http\Controllers;

use App\Models\TimeWeek;
use Illuminate\Http\Request;

class TimeSettingsController extends Controller
{
    public function index()
    {
        $weeks = TimeWeek::where('timetable_year_id', 1)->get();

        return view('time-settings.index', compact('weeks'));
    }
}
