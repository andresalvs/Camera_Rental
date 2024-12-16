<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SetDatabaseConnection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Determine the database connection based on user's role
            switch ($user->role_id) {
                case 3:
                    config(['database.default' => 'manager']);
                    DB::purge('manager'); // Purge the existing connection
                    DB::reconnect('manager'); // Reconnect using the manager configuration
                    break;
                case 2:
                    config(['database.default' => 'employee']);
                    DB::purge('employee');
                    DB::reconnect('employee');
                    break;
                case 1:
                    config(['database.default' => 'customer']);
                    DB::purge('customer');
                    DB::reconnect('customer');
                    break;
                default:
                    // Fallback to the primary connection
                    config(['database.default' => env('DB_CONNECTION', 'pgsql')]);
                    DB::purge(env('DB_CONNECTION', 'pgsql'));
                    DB::reconnect(env('DB_CONNECTION', 'pgsql'));
                    break;
            }
        }
        return $next($request);
    }
}
