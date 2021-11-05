<?php

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

//Generic Laravel page
Route::get('/', function () {
    return view('welcome');
});

//Re-routes to the login page
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//User View Sidebar
Route::get('/master', function () {
    return view('navtemplate.usersidebar');
});

// Random Templates page
Route::get('/templates', function () {
    return view('template');
}); 

// Random Checkout page
Route::get('/checkout', function () {
    return view('checkout');
}); //

// Stripe Payment Page
Route::post('/payment', [StripePaymentController::class, 'payment']);


//Feature page, it's pretty much a homepage
Route::get('/features', function () {
    return view('features');
});

//Subcription plan page
Route::get('/plans', function () {
    return view('plans');
});

//User dashboard or homepage for freemium
Route::get('/dashboard', function () {
    return view('dashboard');
});



//Contact Us page
Route::get('/contactus', function () {
    return view('contactus');
});

//login authentication pages
Auth::routes();

// not sure actually ??
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
