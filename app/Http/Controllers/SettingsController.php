<?php

namespace App\Http\Controllers;

use App\Imports\ModulesImport;
use App\Imports\UsersImport;
use App\Models\Plan;
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
     * Definē sesijā pieejamo gadu
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setYear(Request $request)
    {
        $year = $request->get('year');

        // reseto izvēlēto mācibu gadu
        if ($year == "-1") {
            session(['schoolYear' => null]);
        }

        // sesijā saglabā izvēlētos mācību gadu
        if (in_array($year, Plan::getAvailableYears()->toArray())) {
            session(['schoolYear' => $year]);
        }

        return back();
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
