<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlansController extends Controller
{

    public function index()
    {
        return view('plans.index');
    }

    public function show()
    {
        return view('plans.show');
    }
}
