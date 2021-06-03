<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = User::find(\Auth::user()->id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->job_title = $request->input('job_title');
        $user->save();

        return back()->with(['message'=> 'Profila informācija saglabāta']);
    }

}
