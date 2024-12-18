<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;


class MapController extends Controller
{
    public function showStoreLocation()
    {
        // Replace with your store's actual coordinates
        $storeLocation = [
            'latitude' => 8.9413167, // Example: Latitude for Manila
            'longitude' => 125.5401529, // Example: Longitude for Manila
        ];

        return Inertia::render('myaccount', [
            'storeLocation' => $storeLocation,
        ]);
    }
}
