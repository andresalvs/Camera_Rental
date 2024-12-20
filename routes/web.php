<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\PaymentController;
use App\Models\Cameras;

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\AdminEmployeeController;
use App\Http\Controllers\RentalsSummaryController;
use App\Http\Controllers\MapController;


// Routes requiring authentication
Route::middleware(['auth', 'connect'])->group(function () {

    // Edit Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // FOR EMPLOYEE
    Route::middleware(['employee'])->group(function () {



        // Payments
        Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
        Route::patch('/payments/{id}/status', [PaymentController::class, 'updateStatus'])->name('payments.updateStatus');

        Route::get('/pending-rent', [PaymentController::class, 'getPendingRent'])->name('pending.rent');
    });

    // User Dashboard (Admin Only)
    Route::middleware('admin')->group(function () {
        // CREATING EMPLOYEE ACCOUNT
        Route::get('/admin/employees', [AdminEmployeeController::class, 'index'])->name('employees.index');
        Route::get('/admin/employees/create', [AdminEmployeeController::class, 'create'])->name('employees.create');
        Route::post('/admin/employees', [AdminEmployeeController::class, 'store'])->name('employees.store');

        // MATERIALIZED VIEW
        Route::get('/rentals-summary', [RentalsSummaryController::class, 'index'])
            ->name('rentals-summary.index');

        //ACTIVITY LOG
        Route::get('/activity-logs', [ActivityLogController::class, 'index'])
            ->name('activity-logs.index');

        // Cameras
        Route::post('/cameras', [CameraController::class, 'store_camera'])->name('cameras.store');
        Route::delete('/cameras/{id}', [CameraController::class, 'destroy'])->name('cameras.destroy');

        Route::get('/CameraDashboard', [CameraController::class, 'index_view'])->name('CameraDashboard');

        Route::get('/UserDashboard', [UserController::class, 'index'])->name('UserDashboard');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

        // Camera Dashboard
        Route::post('/cameras/{camera}', [CameraController::class, 'update'])->name('cameras.update');
    });

    //For Customer
    Route::middleware('customer')->group(function () {

        Route::get('/store-location', [MapController::class, 'showStoreLocation'])->name('store.location');

        // // Authenticated Shop
        Route::get('/shop', [CameraController::class, 'index'])->name('shop');
        Route::post('/shop', [CameraController::class, 'store'])->name('shop.store');

        // My Account
        Route::get('/myaccount', [PaymentController::class, 'getRentedItems'])->name('myaccount');

        // Support
        Route::get('/support', function () {
            return Inertia::render('support');
        })->name('support');

        Route::get('/index', function () {
            return Inertia::render('index');
        })->name('index');

        // About Us
        Route::get('/aboutus', function () {
            return Inertia::render('aboutus');
        })->name('aboutus');

        //Home
        Route::get('/home', function () {
            return Inertia::render('home');
        })->name('home');

        Route::post('/support/send-email', [SupportController::class, 'sendEmail'])->name('support.send-email');
    });
});


// Email Verification Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/home');
    })->middleware('signed')->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware('throttle:6,1')->name('verification.send');
});

// Social Authentication
Route::get('auth/google', [SocialiteController::class, 'googleLogin'])->name('auth.google');
Route::get('auth/google-callback', [SocialiteController::class, 'googleCallback']);

// Public Routes
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('landingPage');

Route::get('/shop_guest', [CameraController::class, 'index_guest'])->name('shop_guest');

// Include Auth Routes
require __DIR__ . '/auth.php';
