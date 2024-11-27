<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\TalabaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('talaba',[TalabaController::class,'talaba']);
Route::post('talabastore',[TalabaController::class,'created'])->name('talabastore');

Route::get('agents',[AgentController::class,'agents'])->name('agents');
Route::get('parentcreate',[AgentController::class,'create'])->name('parentcreate');
Route::post('parentstore',[AgentController::class,'parentstore'])->name('parentstore');
Route::get('childs/{agent}',[AgentController::class,'childs'])->name('childs');