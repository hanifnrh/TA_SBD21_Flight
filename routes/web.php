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

Route::get('/', [FlightController::class, 'viewLogin'])->name('login');
Route::post('/', [FlightController::class, 'auth'])->name('auth');


// ADD
Route::get('add', [FlightController::class, 'create'])->name('admin.create');
Route::get('addpassenger', [FlightController::class, 'createpassenger'])->name('admin.createpassenger');

// STORE
Route::post('store', [FlightController::class, 'store'])->name('admin.store');
Route::post('storepassenger', [FlightController::class, 'storepassenger'])->name('admin.storepassenger');


Route::get('/index', [FlightController::class, 'index'])->name('admin.index');
Route::get('passenger', [FlightController::class, 'passenger'])->name('admin.passenger');
Route::get('flight', [FlightController::class, 'flight'])->name('admin.flight');
Route::get('airline', [FlightController::class, 'airline'])->name('admin.airline');

// SORT
Route::get('ascending', [FlightController::class, 'ascending'])->name('admin.ascending');
Route::get('descending', [FlightController::class, 'descending'])->name('admin.descending');
Route::get('ascendingpassenger', [FlightController::class, 'ascendingpassenger'])->name('admin.ascendingpassenger');
Route::get('descendingpassenger', [FlightController::class, 'descendingpassenger'])->name('admin.descendingpassenger');
Route::get('ascendingtrash', [FlightController::class, 'ascendingtrash'])->name('admin.ascendingtrash');
Route::get('descendingtrash', [FlightController::class, 'descendingtrash'])->name('admin.descendingtrash');

Route::get('trash', [FlightController::class, 'trash'])->name('admin.trash');
Route::get('edit/{id}', [FlightController::class, 'edit'])->name('admin.edit');
Route::get('editpassenger/{id}', [FlightController::class, 'editpassenger'])->name('admin.editpassenger');

// UPDATE
Route::post('update/{id}', [FlightController::class, 'update'])->name('admin.update');
Route::post('updatepassenger/{id}', [FlightController::class, 'updatepassenger'])->name('admin.updatepassenger');

// DELETE
Route::post('delete/{id}', [FlightController::class, 'delete'])->name('admin.delete');
Route::post('deletepassenger/{id}', [FlightController::class, 'deletepassenger'])->name('admin.deletepassenger');
Route::post('deletereal/{id}', [FlightController::class, 'deletereal'])->name('admin.deletereal');

// RESTORE
Route::get('restore/{id}', [FlightController::class, 'restore'])->name('admin.restore');

// SEARCH
Route::get('search', [FlightController::class, 'search'])->name('admin.search');
Route::get('searchpassenger', [FlightController::class, 'searchpassenger'])->name('admin.searchpassenger');
Route::get('searchairline', [FlightController::class, 'searchairline'])->name('admin.searchairline');
Route::get('searchflight', [FlightController::class, 'searchflight'])->name('admin.searchflight');
Route::get('searchtrash', [FlightController::class, 'searchtrash'])->name('admin.searchtrash');




// PENUMPANG


// ADD
Route::get('add2', [FlightController::class, 'create'])->name('penumpang.create');
Route::get('addpassenger2', [FlightController::class, 'createpassenger'])->name('penumpang.createpassenger');

// STORE
Route::post('store2', [FlightController::class, 'store'])->name('penumpang.store');
Route::post('storepassenger2', [FlightController::class, 'storepassenger'])->name('penumpang.storepassenger');


Route::get('/index2', [FlightController::class, 'index'])->name('penumpang.index');
Route::get('passenger2', [FlightController::class, 'passenger'])->name('penumpang.passenger');
Route::get('flight2', [FlightController::class, 'flight'])->name('penumpang.flight');
Route::get('airline2', [FlightController::class, 'airline'])->name('penumpang.airline');

// SORT
Route::get('ascending2', [FlightController::class, 'ascending'])->name('penumpang.ascending');
Route::get('descending2', [FlightController::class, 'descending'])->name('penumpang.descending');
Route::get('ascendingpassenger2', [FlightController::class, 'ascendingpassenger'])->name('penumpang.ascendingpassenger');
Route::get('descendingpassenger2', [FlightController::class, 'descendingpassenger'])->name('penumpang.descendingpassenger');

// SEARCH
Route::get('search2', [FlightController::class, 'search'])->name('penumpang.search');
Route::get('searchpassenger2', [FlightController::class, 'searchpassenger'])->name('penumpang.searchpassenger');
Route::get('searchairline2', [FlightController::class, 'searchairline'])->name('penumpang.searchairline');
Route::get('searchflight2', [FlightController::class, 'searchflight'])->name('penumpang.searchflight');
Route::get('searchtrash2', [FlightController::class, 'searchtrash'])->name('penumpang.searchtrash');

