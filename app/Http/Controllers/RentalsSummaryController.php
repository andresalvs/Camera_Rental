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

        //Scalar Function
        $totalRevenue = DB::select('SELECT total_rentals_revenue() AS total_revenue');

        // Access the value from the query result
        $totalRevenue = $totalRevenue[0]->total_revenue;

        // Fetch the updated data, Materialized view
        $rentalsSummary = DB::table('rentals_summary')->get();

        // Send the updated data to the Vue component
        return Inertia::render('RentalsSummary/Index', [
            'rentalsSummary' => $rentalsSummary,
            'totalRevenue' => $totalRevenue,
        ]);
    }
}
