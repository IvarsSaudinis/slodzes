<?php

namespace App\Http\Controllers;

use App\Models\EduWeek;
use Illuminate\Http\Request;

class TimeSettingsController extends Controller
{
    public function index()
    {
        $weeks = EduWeek::where('edu_year_id', 1)->get();

        return view('time-settings.index', compact('weeks'));
    }
}
