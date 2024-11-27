<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\AgentProductController;
use App\Http\Controllers\ProductController;
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
Route::get('agentedit/{agent}',[AgentController::class,'agentedit'])->name('agentedit');
Route::post('parentupdate/{agent}',[AgentController::class,'parentupdate'])->name('parentupdate');
Route::get('agentdelete/{agent}',[AgentController::class,'agentdelete'])->name('agentdelete');
Route::post('addchild/{id}',[AgentController::class,'addchild'])->name('addchild');

Route::get('product',[ProductController::class,'product'])->name('product');
Route::get('createproduct',[ProductController::class,'createproduct'])->name('createproduct');
Route::post('productstore',[ProductController::class,'productstore'])->name('productstore');

Route::post('sotish/{id}',[AgentProductController::class,'sotish'])->name('sotish');
