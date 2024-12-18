<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Cameras;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{



    public function index()
    {
        $customers = User::where('role_id', 1)->get();
        $employees = User::where('role_id', 2)->get();

        return inertia('UserDashboard', [
            'customers' => $customers,
            'employees' => $employees,
        ]);
    }

    public function destroy(User $user)
    {
        // dd($user);
        // Delete the user

        $userToDelete = DB::table('users')->where('id', $user->id)
            ->delete();

        // Redirect back with a success message
        return redirect()->route('UserDashboard')->with('success', 'User deleted successfully.');
    }
}
