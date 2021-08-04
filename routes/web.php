<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\BooksResource;
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

Route::get('/', function () {
    return redirect()->route('year', ['year' => 2021]);
})->name('index');

Route::get('/plan-{year}', [PlanController::class, 'year'])->name('year');

Route::get('/plan-{year}/{faculty}', [PlanController::class, 'faculty'])->name('faculty');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/paid-services', function () {
    return view('paid-services');
})->name('paid-services');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth'])->name('dashboard');

Route::resource('/dashboard/plan-{year}', BooksResource::class);

// Route::get('/dashboard/plan-{year}', function () {
//     return view('dashboard.plan');
// })->middleware(['auth'])->name('dashboard-plan');

require __DIR__.'/auth.php';
