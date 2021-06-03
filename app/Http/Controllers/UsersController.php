<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Users;
use App\Http\Requests\Admin\StoreUserPostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(\Auth::user()->cannot('users-list'), '403');

        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(\Auth::user()->cannot('users-create'), '403');

        $roles = Role::all();

        return view('users.createOrUpdate', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPostRequest $request)
    {
        abort_if(\Auth::user()->cannot('users-create'), '403');

        $user = new User();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->job_title = $request->input('job_title');
        $user->email = $request->input('email');

        // Ja parole ir norādīta, tad..
        $user->password = $request->input('password') ?? ' ';
        $user->save();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with(['message'=>'Lietotājs veiksmīgi izveidots!']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(\Auth::user()->cannot('users-edit'), '403');

        $user = User::findOrFail($id);

        $roles = Role::all();

        return view('users.createOrUpdate', compact('roles', 'user'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserPostRequest $request, $id)
    {
        abort_if(\Auth::user()->cannot('users-edit'), '403');

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->job_title = $request->input('job_title');
        $user->email = $request->input('email');

        if($request->has('password') )
        {
            if($request->input('password')!=$request->input('confirm_password'))
            {
                return back()->with(['message' => 'Diemžēl izvēlētās paroles neatbilda kritērijiem']);

            } else {

                $user->password = \Hash::make($request->input('password'));

            }

        }


        $user->save();

        // piešķiram lomu -> noņemam visas un pieškiram jaunās
        $user->syncRoles($request->input('roles'));

        return redirect()->route('users.index')->with(['message'=>'Lietotājs veiksmīgi saglabāts!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return back()->with(['message'=>'Lietotājs veiksmīgi izdzēsts!']);
    }
}
