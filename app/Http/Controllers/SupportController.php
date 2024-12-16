<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function sendEmail(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $adminEmail = env('MAIL_USERNAME');

        Mail::raw($validated['message'], function ($message) use ($validated, $adminEmail) {
            $message->to($adminEmail)
                ->subject("ZoomPro Support Inquiry, {$validated['name']}")
                ->replyTo($validated['email'], $validated['name']);
        });

        return back()->with('success', 'Email sent successfully.');
    }
}
