<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cameras;
use App\Models\User;
use App\Models\Payments;
use App\Models\ViewAcceptedRent;
use App\Models\ViewPendingRent;
use App\Models\ViewRejectedRent;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class CameraController extends Controller
{

    //for user to view shop
    public function index()
    {
        $cameras = Cameras::all(); // Fetch all cameras
        return Inertia::render('shop', ['cameras' => $cameras]);
    }

    // public function rent(Request $request)
    // {
    //     $validated = $request->validate([
    //         'user_id' => 'required|exists:users,id',
    //         'camera_id' => 'required|exists:cameras,camera_id',
    //         'camera_name' => 'required|string',
    //         'camera_category' => 'required|string',
    //         'camera_price' => 'required|numeric',
    //         'total_price' => 'required|numeric',
    //         'days_rent' => 'required|integer|min:1',
    //         'rent_date' => 'required|date',
    //         'return_date' => 'required|date|after:rent_date',
    //     ]);

    //     $payment = Payments::create($validated);
    //     return response()->json(['message' => 'Payment successfully created!', 'payment' => $payment]);
    // }

    public function index_view()
    {
        // Fetch statistics from views
        $rejected = ViewRejectedRent::first()->total_rejected ?? 0;
        $pending = ViewPendingRent::first()->total_pending ?? 0;
        $accepted = ViewAcceptedRent::first()->total_accepted ?? 0;

        // Fetch camera list
        $cameras = Cameras::all();

        // Pass both datasets to the Inertia view
        return Inertia::render('CameraDashboard', [
            'rejected' => $rejected,
            'pending' => $pending,
            'accepted' => $accepted,
            'cameras' => $cameras,
        ]);
    }

    //users able to rent camera
    public function store(Request $request)
    {
        if (!auth()->check()) {
            return back()->withErrors(['message' => 'You must be logged in to perform this action.']);
        }

        // Validate the input data
        $validated = $request->validate([
            'camera_id' => 'required|exists:cameras,camera_id',
            'camera_name' => 'required|string',
            'camera_category' => 'required|string',
            'camera_price' => 'required|numeric',
            'total_price' => 'required|numeric',
            'days_rent' => 'required|integer',
            'rent_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:rent_date',
        ]);

        // Add authenticated user's ID
        $validated['user_id'] = auth()->id();

        // Store the validated data in the database
        Payments::create($validated);


        return back()->with('success', 'Payment stored successfully.');
    }

    //for guest to view shop
    public function index_guest()
    {
        $cameras = Cameras::all(); // Fetch all cameras
        return Inertia::render('shop_guest', ['cameras' => $cameras]);
    }

    //dashboard
    public function dashboard()
    {
        $cameras = Cameras::all(); // Fetch all cameras
        return Inertia::render('CameraDashboard', ['cameras' => $cameras]);
    }

    public function update(Request $request, Cameras $camera)
    {
        $validatedData = $request->validate([
            'camera_name' => 'required|string|max:255',
            'camera_price' => 'required|numeric|min:0',
            'camera_category' => 'required|string|max:255',
            'camera_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384',
        ]);

        if ($request->hasFile('camera_image')) {
            // Delete the old image if it exists
            if ($camera->camera_image && \Storage::exists("public/{$camera->camera_image}")) {
                \Storage::delete("public/{$camera->camera_image}");
            }

            // Store the new image and update the path
            $validatedData['camera_image'] = $request->file('camera_image')->store('upload', 'public');
        }

        // Update camera attributes
        $camera->update($validatedData);

        return redirect()->back()->with('success', 'Camera updated successfully!');
    }


    //end

    // Insert a new camera
    public function store_camera(Request $request)
    {
        $validatedData = $request->validate([
            'camera_name' => 'required|string|max:255',
            'camera_price' => 'required|numeric|min:0',
            'camera_category' => 'required|string|max:255',
            'camera_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('camera_image')) {
            // Store the image in 'public/uploads' and save the path
            $path = $request->file('camera_image')->store('upload', 'public');
            $validatedData['camera_image'] = $path;
        }

        Cameras::create($validatedData);

        return redirect()->back()->with('success', 'Camera added successfully!');
    }

    // Delete a camera
    public function destroy($id)
    {
        $camera = Cameras::findOrFail($id);
        $camera->delete();

        return redirect()->back()->with('success', 'Camera deleted successfully!');
    }
}
