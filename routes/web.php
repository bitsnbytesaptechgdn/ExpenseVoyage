<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TripController;

// Frontend Routes
Route::get('/', function () {
    return view('Pages.frontendpages.index');
})->name('home');
Route::middleware(['guest'])->group(function () {
    Route::get('/register', function () {
        return view('Pages.authpages.register');
    })->name('register');
    Route::get('/login', function () {
        return view('Pages.authpages.login');
    })->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('password/forgot', [AuthController::class, 'showForgotForm'])->name('password.request');
    Route::post('password/forgot', [AuthController::class, 'sendResetLink'])->name('password.email');
    Route::get('password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [AuthController::class, 'resetPassword'])->name('password.update');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/admin', [AdminController::class, "index"])->name('admin');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('users/search', [UserController::class, 'search'])->name('users.search');

        Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
        Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
        Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
        Route::get('contacts/search', [ContactController::class, 'search'])->name('contacts.search');

        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        Route::get('categories/search', [CategoryController::class, 'search'])->name('categories.search');

        Route::get('/subscribe', [SubscriptionController::class, 'index'])->name('subscribe.index');
        Route::delete('/subscribe/{subscribe}', [SubscriptionController::class, 'destroy'])->name('subscribe.destroy');
        Route::put('/subscribe/{subscribe}', [SubscriptionController::class, 'update'])->name('subscribe.update');
        Route::get('Subscription/search', [SubscriptionController::class, 'search'])->name('subscribe.search');
    });

    Route::middleware(['role:user'])->prefix('admin')->group(function () {
        Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store'); // If applicable for creating contacts

        Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
    });

    Route::get('/trips', [TripController::class, 'index'])->name('trips.index');
    Route::post('/trips', [TripController::class, 'store'])->name('trips.store');
    Route::put('/trips/{trip}', [TripController::class, 'update'])->name('trips.update');
    Route::delete('/trips/{trip}', [TripController::class, 'destroy'])->name('trips.destroy');
    Route::get('trips/sort', [TripController::class, 'sort'])->name('trips.sort');
    Route::get('/trips/{trip_id}/expenses/report', [ExpenseController::class, 'generateReport'])->name('expenses.report');

    Route::get('/itineraries', [ItineraryController::class, 'index'])->name('itineraries.index');
    Route::post('/itineraries', [ItineraryController::class, 'store'])->name('itineraries.store');
    Route::put('/itineraries/{itinerary}', [ItineraryController::class, 'update'])->name('itineraries.update');
    Route::delete('/itineraries/{itinerary}', [ItineraryController::class, 'destroy'])->name('itineraries.destroy');

    Route::get('/expenses/{trip_id}', [ExpenseController::class, 'index'])->name('expenses.index');
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
    Route::put('/expenses/{expense}', [ExpenseController::class, 'update'])->name('expenses.update');
    Route::delete('/expenses/{expense}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
});