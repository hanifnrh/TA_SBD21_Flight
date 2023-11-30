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

// ADD
Route::get('add', [FlightController::class, 'create'])->name('penumpang.create');
Route::get('addpassenger', [FlightController::class, 'createpassenger'])->name('penumpang.createpassenger');

// STORE
Route::post('store', [FlightController::class, 'store'])->name('penumpang.store');
Route::post('storepassenger', [FlightController::class, 'storepassenger'])->name('penumpang.storepassenger');


Route::get('/', [FlightController::class, 'index'])->name('penumpang.index');
Route::get('passenger', [FlightController::class, 'passenger'])->name('penumpang.passenger');
Route::get('flight', [FlightController::class, 'flight'])->name('penumpang.flight');
Route::get('airline', [FlightController::class, 'airline'])->name('penumpang.airline');

// SORT
Route::get('ascending', [FlightController::class, 'ascending'])->name('penumpang.ascending');
Route::get('descending', [FlightController::class, 'descending'])->name('penumpang.descending');
Route::get('ascendingpassenger', [FlightController::class, 'ascendingpassenger'])->name('penumpang.ascendingpassenger');
Route::get('descendingpassenger', [FlightController::class, 'descendingpassenger'])->name('penumpang.descendingpassenger');
Route::get('ascendingtrash', [FlightController::class, 'ascendingtrash'])->name('penumpang.ascendingtrash');
Route::get('descendingtrash', [FlightController::class, 'descendingtrash'])->name('penumpang.descendingtrash');

Route::get('trash', [FlightController::class, 'trash'])->name('penumpang.trash');
Route::get('edit/{id}', [FlightController::class, 'edit'])->name('penumpang.edit');
Route::get('editpassenger/{id}', [FlightController::class, 'editpassenger'])->name('penumpang.editpassenger');

// UPDATE
Route::post('update/{id}', [FlightController::class, 'update'])->name('penumpang.update');
Route::post('updatepassenger/{id}', [FlightController::class, 'updatepassenger'])->name('penumpang.updatepassenger');

// DELETE
Route::post('delete/{id}', [FlightController::class, 'delete'])->name('penumpang.delete');
Route::post('deletepassenger/{id}', [FlightController::class, 'deletepassenger'])->name('penumpang.deletepassenger');
Route::post('deletereal/{id}', [FlightController::class, 'deletereal'])->name('penumpang.deletereal');

// SEARCH
Route::get('search', [FlightController::class, 'search'])->name('penumpang.search');
Route::get('searchpassenger', [FlightController::class, 'searchpassenger'])->name('penumpang.searchpassenger');
Route::get('searchairline', [FlightController::class, 'searchairline'])->name('penumpang.searchairline');
Route::get('searchflight', [FlightController::class, 'searchflight'])->name('penumpang.searchflight');
Route::get('searchtrash', [FlightController::class, 'searchtrash'])->name('penumpang.searchtrash');


