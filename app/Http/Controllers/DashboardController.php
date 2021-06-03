<?php

namespace App\Http\Controllers;

use App\Models\Modules;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users_count = User::count();

        $modules_count = Modules::count();

        return view('dashboard', compact('users_count', 'modules_count'));
    }
}
