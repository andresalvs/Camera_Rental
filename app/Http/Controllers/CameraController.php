<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cameras;
use App\Models\Stocks;
use App\Models\Payments;
use App\Models\ViewAcceptedRent;
use App\Models\ViewPendingRent;
use App\Models\ViewRejectedRent;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class CameraController extends Controller
{

    //CUSTOMER --> CAMERALIST
    public function index()
    {
        $cameras = Cameras::all(); // Fetch all cameras
        return Inertia::render('shop', ['cameras' => $cameras]);
    }

    //ADMIN --> REGULAR VIEWS 
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

    //USER --> RENT CAMERA
    public function store(Request $request)
    {
        if (!auth()->check()) {
            return back()->withErrors(['message' => 'You must be logged in to perform this action.']);
        }
        // Fetch the camera and its stock



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

    //NON-LOGIN_USER --> GUEST VIEW SHOP
    public function index_guest()
    {
        $cameras = Cameras::all(); // Fetch all cameras
        return Inertia::render('shop_guest', ['cameras' => $cameras]);
    }

    //ADMIN --> SHOWING CAMERA LIST IN CAMERADASHBOARD
    public function dashboard()
    {
        $cameras = Cameras::all(); // Fetch all cameras
        return Inertia::render('CameraDashboard', ['cameras' => $cameras]);
    }

    // ADMIN --> UPDATE CAMERA
    public function update(Request $request, Cameras $camera)
    {
        // Determine the connection dynamically
        $connection = session('connection');

        // Input validation with sanitization rules
        $validatedData = $request->validate([
            'camera_name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'], // Letters and spaces only
            'camera_price' => 'required|numeric|min:0',
            'camera_category' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'camera_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384', // Max 16MB
        ]);

        // Purge and reconnect to dynamic connection
        DB::purge($connection);
        config(['database.default' => $connection]);
        DB::reconnect($connection);

        // Handle file upload and delete old image
        if ($request->hasFile('camera_image')) {
            if ($camera->camera_image && Storage::exists("public/{$camera->camera_image}")) {
                Storage::delete("public/{$camera->camera_image}");
            }
            $validatedData['camera_image'] = $request->file('camera_image')->store('upload', 'public');
        } else {
            // Preserve the old image if no new image is uploaded
            $validatedData['camera_image'] = $camera->camera_image;
        }

        // Sanitize input values before saving (strip_tags removes malicious scripts)
        $validatedData['camera_name'] = strip_tags($validatedData['camera_name']);
        $validatedData['camera_category'] = strip_tags($validatedData['camera_category']);

        // Update camera record in the database
        DB::table('cameras')
            ->where('camera_id', $camera->camera_id)
            ->update([
                'camera_name' => $validatedData['camera_name'],
                'camera_price' => $validatedData['camera_price'],
                'camera_category' => $validatedData['camera_category'],
                'camera_image' => $validatedData['camera_image'] ?? $camera->camera_image,
                'updated_at' => now(),
            ]);

        return redirect()->back()->with('success', 'Camera updated successfully!');
    }

    // ADMIN --> CREATING CAMERA
    public function store_camera(Request $request)
    {
        // Input validation with sanitization rules
        $validatedData = $request->validate([
            'camera_name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'], // Only letters and spaces
            'camera_price' => 'required|numeric|min:0',
            'camera_category' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
            'camera_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        // Sanitize input fields
        $validatedData['camera_name'] = strip_tags($validatedData['camera_name']);
        $validatedData['camera_category'] = strip_tags($validatedData['camera_category']);

        // Handle image upload
        if ($request->hasFile('camera_image')) {
            $path = $request->file('camera_image')->store('upload', 'public');
            $validatedData['camera_image'] = $path;
        }

        // Create new camera record
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
