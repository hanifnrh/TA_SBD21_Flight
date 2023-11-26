<?php

use App\Http\Controllers\FlightController;
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
    return view('welcome');
});

Route::get('add', [FlightController::class, 'create'])->name('penumpang.create');
Route::post('store', [FlightController::class, 'store'])->name('penumpang.store');
Route::get('/', [FlightController::class, 'index'])->name('penumpang.index');
Route::get('passenger', [FlightController::class, 'passenger'])->name('penumpang.passenger');
Route::get('flight', [FlightController::class, 'flight'])->name('penumpang.flight');
Route::get('airline', [FlightController::class, 'airline'])->name('penumpang.airline');

Route::get('ascending', [FlightController::class, 'ascending'])->name('penumpang.ascending');
Route::get('descending', [FlightController::class, 'descending'])->name('penumpang.descending');
Route::get('ascendingtrash', [FlightController::class, 'ascendingtrash'])->name('penumpang.ascendingtrash');
Route::get('descendingtrash', [FlightController::class, 'descendingtrash'])->name('penumpang.descendingtrash');

Route::get('trash', [FlightController::class, 'trash'])->name('penumpang.trash');
Route::get('edit/{id}', [FlightController::class, 'edit'])->name('penumpang.edit');
Route::post('update/{id}', [FlightController::class, 'update'])->name('penumpang.update');
Route::post('delete/{id}', [FlightController::class, 'delete'])->name('penumpang.delete');
Route::post('deletereal/{id}', [FlightController::class, 'deletereal'])->name('penumpang.deletereal');
// Route::get('inner-join', [FlightController::class, 'innerJOIN']);
Route::get('search', [FlightController::class, 'search'])->name('penumpang.search');
Route::get('searchtrash', [FlightController::class, 'searchtrash'])->name('penumpang.searchtrash');


