<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */

     public function update(Request $request): RedirectResponse
     {
         // Validate the request data
         $validated = $request->validate([
             'name' => [
                 'required',
                 'string',
                 'max:255',
                 'regex:/^[a-zA-Z\s]+$/', // Only allows letters and spaces
             ],
             'email' => [
                 'required',
                 'string',
                 'email',
                 'max:255',
                 'regex:/^[^<>]*$/', // Disallow '<' and '>'
             ],
             // Add other fields here if necessary
         ]);
     
         $id = Auth::user()->id;
     
         // Sanitize inputs
         $sanitizedName = htmlspecialchars($validated['name'], ENT_QUOTES, 'UTF-8');
         $sanitizedEmail = htmlspecialchars($validated['email'], ENT_QUOTES, 'UTF-8');
     
         // Update the user's information in the database
         DB::table('users')
             ->where('id', $id)
             ->update([
                 'name' => $sanitizedName,
                 'email' => $sanitizedEmail,
                 'email_verified_at' => null, // Reset email verification if email is updated
             ]);
     
         return Redirect::route('profile.edit')->with('success', 'Profile updated successfully!');
     }
     
     
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
