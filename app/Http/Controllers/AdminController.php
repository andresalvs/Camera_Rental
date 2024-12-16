<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cameras;

class AdminController extends Controller
{
    // Display the admin dashboard
    public function index()
    {
        $cameras = Cameras::all(); // Fetch all cameras
        return inertia('Admin/Dashboard', ['cameras' => $cameras]);
    }

    // Update the camera price
    public function updatePrice(Request $request, $id)
    {
        $validated = $request->validate([
            'camera_price' => 'required|numeric|min:0',
        ]);

        $camera = Cameras::findOrFail($id);
        $camera->camera_price = $validated['camera_price'];
        $camera->save();

        return redirect()->back()->with('success', 'Camera price updated successfully!');
    }
}
