<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\petController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [petController::class, 'Slider']);
Route::get('/pets/list', [petController::class, 'listPets']);
Route::post('/pets/add', [petController::class, 'addPet'])->name('pets.add');
Route::get('/pets/add', [petController::class, 'showPetForm'])->name('pets.add.form');
Route::delete('/pets/{id}/delete', [petController::class, 'deletePet'])->name('pets.delete');



