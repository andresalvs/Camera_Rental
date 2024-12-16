<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB; //for DATABASE


class PaymentController extends Controller
{
    public function getPendingRent()
    {
        // Call the PostgreSQL function using raw SQL
        $pendingRentals = DB::select('SELECT * FROM get_pending_rent()');

        // Return the data to an Inertia view
        return inertia('Payments/PendingRent', [
            'pendingRentals' => $pendingRentals
        ]);
    }

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
        $user = $request->user(); // Gets the currently authenticated user
        $rentedItems = $user->payments()->get();

        return Inertia::render('myaccount', [
            'rentedItems' => $rentedItems,
        ]);
    }
}
