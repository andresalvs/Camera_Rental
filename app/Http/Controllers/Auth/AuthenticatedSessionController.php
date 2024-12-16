<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\DB;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        // Attempt login
        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Get authenticated user
            $user = Auth::user();
            // dd($user->role_id);
            // Change database connection based on user's role
            switch ($user->role_id) {
                case 3:
                    // Update the default database connection to 'manager'
                    config(['database.default' => 'manager']);
                    DB::purge('manager'); // Disconnect existing connection to avoid caching
                    return redirect()->route('CameraDashboard');
                    break;
                case 2:
                    // Update the default database connection to 'employee'
                    config(['database.default' => 'employee']);
                    DB::purge('employee');
                    return redirect()->route('payments.index');
                    break;
                case 1:
                    // Update the default database connection to 'customer'
                    config(['database.default' => 'customer']);
                    DB::purge('customer');
                    return redirect()->route('home');
                    break;
                default:
                    // Fallback to the default connection defined in .env
                    config(['database.default' => env('DB_CONNECTION', 'pgsql')]);
                    DB::purge(env('DB_CONNECTION', 'pgsql'));
                    break;
            }
            // dd(config('database.default'));



        }

        return redirect()->intended(route('home', absolute: false));
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
