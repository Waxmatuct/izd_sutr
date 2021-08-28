<?php

use App\Http\Controllers\BookResource;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PlanController;
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

Route::get('/about', [PagesController::class, 'about'])->name('about');

Route::get('/help', [PagesController::class, 'help'])->name('help');

Route::get('/paid-service', [PagesController::class, 'paidServices'])->name('paid-services');

Route::get('/blanks', [PagesController::class, 'blanks'])->name('blanks');

Route::get('/types', [PagesController::class, 'types'])->name('types');


Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::get('plan-{year}', [DashboardController::class, 'year'])->name('year');

    Route::resource('book', BookResource::class);
});

require __DIR__ . '/auth.php';
