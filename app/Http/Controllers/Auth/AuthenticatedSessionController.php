<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Redirect the user to the o365 authentication page.
     *
     * References to env('GRAPH_TENANT_ID') can be changed to
     * config('services.graph.tenant_id') which bypasses the Laravel
     * config cache.
     *
     * See https://github.com/SocialiteProviders/Providers/issues/337
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::with('graph')
            ->setTenantId(env('GRAPH_TENANT_ID'))
            ->redirect();
    }

    /**
     * Obtain the user information from o365.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback()
    {
        $userdata = Socialite::driver('graph')
            ->setTenantId(env('GRAPH_TENANT_ID'))
            ->user();

        //  echo 'Looks like we got there as ' . dd($userdata->name);
        // saglabājam datubāzē atjaunotu lietotāju (vai esošo atjauninam)
        $user = User::firstOrCreate(
            ['email' => $userdata->user['mail']],
            [
                'name' => $userdata->name,
                'remember_token' => $userdata->id,
                'surname' => $userdata->user['surname'],
                'password' => 'password'
            ]
        );

        // Autorizējam lietotāju
        Auth::login($user);

        // redirektē uz sākumlapu
        return redirect()->route('dashboard');
    }
}
