<?php

namespace App\Http\Controllers;

use App\Imports\ModulesImport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\DbDumper\Compressors\GzipCompressor;
use Spatie\DbDumper\Databases\MySql;
use Spatie\Permission\Models\Role;
use function PHPUnit\Framework\returnArgument;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('settings.index', compact('roles'));
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
     * Importē moduļu sarakstu no xls/csv faila
     *
     * @param Request $request
     */
    public function importModules(Request $request)
    {
        Excel::import(new ModulesImport(), $request->file('module_import')->store('temp'));

        return back()->with(['message'=>'Dati importēti!']);
    }


    /**
     * SQL dump lejupielāde
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function dumpSql()
    {
        $filename = 'sistema_'. time() . '.sql.gz';

        MySql::create()
            ->setDbName(config('database.connections.mysql.database'))
            ->setUserName(config('database.connections.mysql.username'))
            ->setPassword(config('database.connections.mysql.password'))
            ->useCompressor(new GzipCompressor())
            ->dumpToFile($filename);

        return response()->download($filename)->deleteFileAfterSend();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
