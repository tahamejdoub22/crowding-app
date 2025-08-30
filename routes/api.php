<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProjectApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public API routes
Route::prefix('v1')->group(function () {
    // Authentication routes
    Route::post('auth/register', [AuthController::class, 'register']);
    Route::post('auth/login', [AuthController::class, 'login']);
    
    // Public project routes
    Route::get('projects', [ProjectApiController::class, 'index']);
    Route::get('projects/featured', [ProjectApiController::class, 'featured']);
    Route::get('projects/trending', [ProjectApiController::class, 'trending']);
    Route::get('projects/staff-picks', [ProjectApiController::class, 'staffPicks']);
    Route::get('projects/ending-soon', [ProjectApiController::class, 'endingSoon']);
    Route::get('projects/recent', [\App\Http\Controllers\HomeController::class, 'getRecentProjects']);
    Route::get('projects/categories', [ProjectApiController::class, 'categories']);
    Route::get('projects/{project}', [ProjectApiController::class, 'show']);
    Route::get('projects/{project}/analytics', [ProjectApiController::class, 'analytics']);
    
    // Home page data
    Route::get('home/stats', [\App\Http\Controllers\HomeController::class, 'getStats']);
    Route::get('home/featured', [\App\Http\Controllers\HomeController::class, 'getFeaturedProjects']);
    
    // Public statistics
    Route::get('stats', function () {
        return response()->json([
            'total_projects' => \App\Models\Project::count(),
            'total_funded' => \App\Models\Project::sum('raised_amount') ?? 0,
            'total_backers' => \App\Models\User::whereHas('roles', function($q) {
                $q->where('name', 'projectinvestor');
            })->count(),
            'success_rate' => 98.5,
            'countries' => 180,
            'platform_fee' => 5.0
        ]);
    });
    
    // Newsletter subscription
    Route::post('newsletter', function (Illuminate\Http\Request $request) {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscriptions,email'
        ]);
        
        // Store newsletter subscription (you might want to create a model for this)
        \DB::table('newsletter_subscriptions')->insert([
            'email' => $request->email,
            'subscribed_at' => now(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Successfully subscribed to newsletter!'
        ]);
    });
});

// Fallback routes without version prefix for backward compatibility
Route::get('projects', [ProjectApiController::class, 'index']);
Route::get('projects/featured', [ProjectApiController::class, 'featured']);
Route::get('projects/{project}', [ProjectApiController::class, 'show']);

// Protected API routes
Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    // Authentication routes
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::get('auth/me', [AuthController::class, 'me']);
    Route::post('auth/refresh', [AuthController::class, 'refresh']);
    
    // Legacy user route
    Route::get('/user', function (Request $request) {
        return response()->json([
            'status' => 'success',
            'data' => $request->user(),
        ]);
    });

    // Project management routes
    Route::post('projects', [ProjectApiController::class, 'store']);
    Route::put('projects/{project}', [ProjectApiController::class, 'update']);
    Route::delete('projects/{project}', [ProjectApiController::class, 'destroy']);
});
