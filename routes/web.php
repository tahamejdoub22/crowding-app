<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Public project exploration routes (no authentication required)
Route::get('/explore', [ProjectController::class, 'explore'])->name('project.explore');
Route::get('/explore/{project}', [ProjectController::class, 'publicShow'])->name('project.public');

// auth route for both
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('about');
    Route::get('/testimonial', 'App\Http\Controllers\TestimonialsController@test')->name('testimonial');
    Route::get('/teams', 'App\Http\Controllers\TeamController@test')->name('teams');
});
// Admin-only routes
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::resource('/testimonials', TestimonialsController::class);
});

// Routes accessible by Project Responsable (and Admin) - Full CRUD access
Route::group(['middleware' => ['auth', 'role:admin|projectresponsable']], function () {
    Route::resource('/reward', RewardController::class);
    Route::resource('/updates', UpdateController::class);
    Route::resource('/team', TeamController::class);
});

// Project routes - different access levels
Route::group(['middleware' => ['auth', 'role:admin|projectresponsable']], function () {
    // Full CRUD for admin and project responsable
    Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/project/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/project/{project}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/project/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');
});

// Project viewing routes - accessible by all roles
Route::group(['middleware' => ['auth', 'role:admin|projectresponsable|projectinvestor']], function () {
    Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/project/{project}', [ProjectController::class, 'show'])->name('project.show');
});

// Routes accessible by all authenticated users (Admin, Project Responsable, Project Investor)
Route::group(['middleware' => ['auth']], function () {
    Route::resource('/comment', CommentController::class);
    // Investors can view and comment on projects
});
// Investor-specific routes
Route::group(['middleware' => ['auth', 'role:projectinvestor']], function () {
    // Investor Dashboard and Profile
    Route::get('/investor/dashboard', 'App\Http\Controllers\InvestorController@dashboard')->name('investor.dashboard');
    Route::get('/investor/profile', 'App\Http\Controllers\InvestorController@profile')->name('investor.profile');
    Route::put('/investor/profile', 'App\Http\Controllers\InvestorController@updateProfile')->name('investor.profile.update');
    
    // Payment Settings
    Route::get('/investor/payment-settings', 'App\Http\Controllers\InvestorController@paymentSettings')->name('investor.payment-settings');
    Route::post('/investor/payment-settings', 'App\Http\Controllers\InvestorController@storePaymentMethod')->name('investor.payment-settings.store');
    Route::delete('/investor/payment-methods/{id}', 'App\Http\Controllers\InvestorController@deletePaymentMethod')->name('investor.payment-methods.destroy');
    
    // Backed Projects
    Route::get('/investor/backed-projects', 'App\Http\Controllers\InvestorController@backedProjects')->name('investor.backed-projects');
    Route::get('/investor/backed-projects/{investment}', 'App\Http\Controllers\InvestorController@backedProjectDetails')->name('investor.backed-projects.show');
    
    // Project Backing Flow
    Route::get('/project/{project}/back', 'App\Http\Controllers\InvestorController@backProject')->name('project.back');
    Route::post('/project/{project}/back', 'App\Http\Controllers\InvestorController@confirmBacking')->name('project.back.submit');
    Route::post('/project/{project}/back/process', 'App\Http\Controllers\InvestorController@processBacking')->name('project.back.process');
    
    // Legacy routes (keeping for backward compatibility)
    Route::post('/detail/{id}', 'App\Http\Controllers\DetailController@store')->name('detail');
    Route::get('/detail/{id}', 'App\Http\Controllers\DetailController@create')->name('detail');
    Route::get('/detail/{id}', 'App\Http\Controllers\DetailController@show')->name('detail');
    Route::get('stripe', [StripeController::class, 'index'])->name('stripe');
    Route::post('payment-process', [StripeController::class, 'process']);
});
Route::group(['middleware' => ['auth', 'role:projectresponsable']], function () {
    Route::post('/deatil1/{id}', 'App\Http\Controllers\ProjectResponsableController@store')->name('detail1');
    // Route::put('/detail/{id}','App\Http\Controllers\DetailController@store')->name('detail');
    Route::get('/deatil1/{id}', 'App\Http\Controllers\ProjectResponsableController@create')->name('detail1');
    Route::post('/rewardlist', 'App\Http\Controllers\ProjectResponsableController@storeres')->name('detail1');
    Route::get('/createlist', 'App\Http\Controllers\ProjectResponsableController@index')->name('createres');
    Route::post('/createlist', 'App\Http\Controllers\ProjectResponsableController@storere')->name('detail1');
    Route::get('/rewardlist', 'App\Http\Controllers\ProjectResponsableController@createre')->name('createre');

    Route::get('/createres', 'App\Http\Controllers\ProjectResponsableController@createres')->name('createres');
    Route::get('/deatil1/{id}', 'App\Http\Controllers\ProjectResponsableController@show')->name('detail1');
    // storere
    // Route::post('project', 'ProjectController@store')
});
require __DIR__ . '/auth.php';
