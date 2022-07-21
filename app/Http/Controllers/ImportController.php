<?php

namespace App\Http\Controllers;

use App\Imports\ModulesImport;
use App\Imports\UsersImport;
use App\Models\EduYear;
use App\Models\Plan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        $years = EduYear::all();

        return view('import.index', compact('roles', 'years'));
    }

    /**
     * Importē lietotāju sarakstu no xls/csv faila
     *
     * @param Request $request
     */
    public function importUsers(Request $request)
    {
        $roles = $request->input('role');

        Excel::import(new UsersImport($roles), $request->file('user_import')->store('temp'));

        return back()->with(['message'=>'Dati importēti!']);
    }

    /**
     * Importē plānā moduļu sarakstu no xls/csv faila
     *
     * @param Request $request
     */
    public function importModules(Request $request)
    {
         $request->validate([
            'plan_name' => 'required|max:255',
            'year' => 'required|numeric|min:1|max:20',
         ]);

        // Jauna plāna izveide
        $plan = new Plan();
        $plan->name = $request->get('plan_name');
        $plan->edu_year_id = $request->get('year');
        $plan->save();



        $plan = [$plan->id];

        $module_import = new ModulesImport($plan);

        Excel::import($module_import, $request->file('module_file')->store('temp'));

        return back()->with(['message'=>'Dati importēti! Kopā ' . $module_import->getRowCount() . ' rindas.']);
    }
}
