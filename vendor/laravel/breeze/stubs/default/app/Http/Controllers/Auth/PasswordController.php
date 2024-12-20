<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        // Validate the incoming request
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        // Update the password using Query Builder
        DB::table('users')
            ->where('id', Auth::id()) // Get the current authenticated user's ID
            ->update([
                'password' => Hash::make($validated['password']), // Hash the new password
            ]);

        // Redirect back with a status message
        return back()->with('status', 'password-updated');
    }
}
