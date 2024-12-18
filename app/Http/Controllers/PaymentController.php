<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB; //for DATABASE


class PaymentController extends Controller
{

    // Fetch payments with filtering
    public function index()
    {
        $payments = Payments::with('user') // Eager load user if needed
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('index', ['payments' => $payments]);
    }

    // Update the status of a payment
    public function updateStatus(Request $request, $id)
    {
        $payment = Payments::findOrFail($id);

        // Validate input
        $request->validate([
            'status' => 'required|in:pending,accept,reject',
        ]);

        $payment->status = $request->status;
        $payment->save();

        return redirect()->back()->with('success', 'Payment status updated successfully.');
    }

    public function getRentedItems(Request $request)
    {
        $storeLocation = [
            'latitude' => 8.9413167, // Example: Latitude for Manila
            'longitude' => 125.5401529, // Example: Longitude for Manila
        ];

        $user = $request->user(); // Gets the currently authenticated user
        $rentedItems = $user->payments()->get();

        return Inertia::render('myaccount', [
            'rentedItems' => $rentedItems,
            'storeLocation' => $storeLocation
        ]);
    }
}
