<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimeSettingsController extends Controller
{
    public function index()
    {
        return view('time-settings.index');
    }
}
