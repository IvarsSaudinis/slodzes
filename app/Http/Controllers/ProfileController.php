<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function password(Request $request)
    {
        $this->validate($request,
            [
                'current_password' => 'required|password',
                'password' => 'required|min:8',
                'password2' => 'required|same:password'
            ]
        );

        $user = User::find(Auth::user()->id);

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return back()->with(['message'=> 'Parole nomainīta']);
    }

}
