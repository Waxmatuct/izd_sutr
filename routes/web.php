<?php

use App\Http\Controllers\BookResource;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;
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

Route::view('/about', 'pages.about')->name('about');
Route::view('/biblio-links', 'pages.biblio')->name('biblio');
Route::view('/blanks', 'pages.blanks')->name('blanks');
Route::view('/contacts', 'pages.contacts')->name('contacts');
Route::view('/glossary', 'pages.glossary')->name('glossary');
Route::view('/help', 'pages.help')->name('help');
Route::view('/paid-services', 'pages.paid-services')->name('paid-services');
Route::view('/types', 'pages.types')->name('types');

Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::get('plan-{year}', [DashboardController::class, 'year'])->name('year');

    Route::resource('book', BookResource::class);
    Route::get('/send-plan', [MailController::class, 'sendPlan'])->name('sendPlan');
});

require __DIR__ . '/auth.php';
