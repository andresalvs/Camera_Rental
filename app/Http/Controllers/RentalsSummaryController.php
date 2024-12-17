<?php

namespace App\Http\Controllers;

use App\Models\RentalsSummary;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;


class RentalsSummaryController extends Controller
{
    public function index()
    {
        // Refresh the materialized view
        DB::statement('REFRESH MATERIALIZED VIEW rentals_summary');

        // Fetch the updated data
        $rentalsSummary = DB::table('rentals_summary')->get();

        // Send the updated data to the Vue component
        return Inertia::render('RentalsSummary/Index', [
            'rentalsSummary' => $rentalsSummary,
        ]);
    }
}
