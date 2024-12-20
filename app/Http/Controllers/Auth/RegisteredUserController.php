<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/', // Only allows letters and spaces
            ],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class,
                'regex:/^[^<>]*$/', // Disallow '<' and '>'
            ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
        $default_role_id = 1;
    
        // Sanitize inputs
        $sanitizedName = htmlspecialchars($request->name, ENT_QUOTES, 'UTF-8');
        $sanitizedEmail = htmlspecialchars($request->email, ENT_QUOTES, 'UTF-8');
    
        // Create the user with sanitized data
        $user = User::create([
            'name' => $sanitizedName,
            'email' => $sanitizedEmail,
            'password' => Hash::make($request->password),
            'role_id' => $default_role_id,
        ]);
    
        // Fire the Registered event
        event(new Registered($user));
    
        // Log the user in
        Auth::login($user);
    
        // Redirect to the home page
        return redirect(route('home', absolute: false));
    }
    
    
    
}
