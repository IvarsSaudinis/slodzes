<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $plans = Plan::all();

        return view('plans.index', compact('plans'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $plan = Plan::where('id', $id)->with(['data'])->first();

        if(is_null($plan))  return  abort('404');

        return view('plans.show', compact('plan'));
    }

    public function edit($id)
    {
        return view('plans.form');
    }
}
