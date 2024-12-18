<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ActivityLogController extends Controller
{
    /**
     * Display the activity logs.
     */

    //  TABLE VALUE FUNCTION and 
    public function index(Request $request)
    {
        $actionFilter = $request->query('action');

        if ($request->wantsJson()) {
            if ($actionFilter) {
                $activityLogs = DB::select('SELECT * FROM filter_activity_logs_by_action(?)', [$actionFilter]);
            } else {
                $activityLogs = DB::table('activity_logs')->orderBy('changed_at', 'desc')->get();
            }

            return response()->json([
                'activityLogs' => $activityLogs,
            ]);
        }

        // Default Inertia render for initial page load
        return Inertia::render('ActivityLogs/Index', [
            'activityLogs' => DB::table('activity_logs')->orderBy('changed_at', 'desc')->get(),
        ]);
    }
}
