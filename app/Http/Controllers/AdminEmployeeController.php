<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class AdminEmployeeController extends Controller
{

    // Show Employee Creation Form
    public function create()
    {
        return inertia('Admin/EmployeeCreate'); // Vue page for employee creation
    }

    // Store New Employee
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'regex:/^[a-zA-Z\s]+$/', // Only alphabets and spaces allowed
                'min:3',                 // Minimum length 3
                'max:50'                 // Maximum length 50
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users'
            ],
            'password' => [
                'required',
                'string',
                'min:8',                 // Minimum length 8
                'max:50',                // Maximum length 50
                'confirmed',
                'regex:/^[\w!@#$%^&*()_\-+=<>?{}[\]~`]+$/' // Allow only alphanumeric and safe special characters
            ],
            'password_confirmation' => 'required|string|min:8|max:50',
            'role_id' => ['required', Rule::in([2])]
        ]);
    
        // Sanitize inputs for name and email only
        $sanitizedName = htmlspecialchars($request->name, ENT_QUOTES, 'UTF-8');
        $sanitizedEmail = htmlspecialchars($request->email, ENT_QUOTES, 'UTF-8');
    
        // Password does not need sanitization, only secure hashing
        User::create([
            'name' => $sanitizedName,
            'email' => $sanitizedEmail,
            'password' => Hash::make($request->password), // Directly hash the validated password
            'role_id' => $request->role_id,
        ]);
    
        return redirect()->route('UserDashboard')->with('success', 'Employee created successfully!');
    }
    
    
}
