<?php

namespace App\Http\Controllers;

use App\Models\Modules;
use App\Models\ModulesUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Modules::orderBy('name')->get();

        return view('modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules_type = DB::table('modules_types')->get();

        $module = new Modules();

        return view('modules.createOrUpdate', compact('modules_type', 'module'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //todo: store requst, kas validētu vai ir cipari un vajadzīgie lauki

        $module = new Modules();
        $module->name = $request->input('name');
        $module->modules_type_id = $request->input('modules_type_id');
        $module->code = $request->input('code');
        $module->theory = $request->input('theory');
        $module->practice = $request->input('practice');
        $module->save();

        return redirect()->route('modules.index')->with(['message' => 'Modulis veiksmīgi izveidots!']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Modules $modules
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Modules $module)
    {
        $modules_type = DB::table('modules_types')->get();

        $modules_users = ModulesUsers::where('modules_id', $module->id)->with('user')->get();

       // return dd($modules_users);

        return view('modules.createOrUpdate', compact('module', 'modules_type', 'modules_users'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeuser(Request $request)
    {
        $module_user = ModulesUsers::findOrFail($request->get('user'));

        $module_user->delete();

        return back()->with(['Message' => 'Lietotājs noņemts']);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modules $module)
    {
        $module->update($request->all());
//        $module->name = $request->input('name');
//        $module->modules_type_id = $request->input('modules_type_id');
//        $module->code = $request->input('code');
//        $module->theory = $request->input('theory');
//        $module->practice = $request->input('practice');
        //  $module->save();

        return redirect()->route('modules.index')->with(['message' => 'Modulis veiksmīgi saglabāts!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modules $module)
    {
        $module->delete();

        return back()->with(['message' => 'Modulis veiksmīgi izdzēsts!']);
    }
}
