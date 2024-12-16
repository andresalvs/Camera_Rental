<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialiteController extends Controller
{
    // Redirect to Google Login
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle Google Callback
    public function googleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'role_id' => 1,
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt('default-password'), // Or generate a secure random password
                ]);
            }

            Auth::login($user);
            return redirect('home'); // Redirect to the desired page
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['msg' => 'Google login failed.']);
        }
    }
}
