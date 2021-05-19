<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DepartmenController;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $user = User::all();
    return view('dashboard',compact('user'));
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/department/all',[DepartmenController::class,'index'])->name('department');
    Route::post('/department/add',[DepartmenController::class,'store'])->name('department_add');
});