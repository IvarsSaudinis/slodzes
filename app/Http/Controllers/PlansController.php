<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\PlanData;
use App\Models\PlanDistribution;
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

        if (is_null($plan)) {
            return  abort('404');
        }

        return view('plans.show', compact('plan'));
    }

    public function edit($id)
    {
        return view('plans.form');
    }


    public function destroy(Plan $plan)
    {

        $plan->delete();

        return back()->with(['message'=> 'Plāns izdzēsts']);
    }

    /**
     * Dzēst moduļa datus no plāna
     * @return void
     */
    public function deletedata(Request $request, $id)
    {
        $plan_data_id = $request->get('plan_data');

        // prasta dzešana
        PlanDistribution::where('plan_data_id', $plan_data_id)->delete();
        PlanData::find($plan_data_id)->delete();

        return back()->with(['message' => 'Modulis izdzēsts no plāna']);

    }

}
