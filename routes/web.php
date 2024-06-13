<?php
use App\Http\Controllers\Admin\HitungController;
use \App\Http\Controllers\Admin\KriteriaController;
use \App\Http\Controllers\Admin\AlternatifController;
use \App\Http\Controllers\Admin\DashboardController;
use \App\Http\Controllers\Admin\KosanController;
use \App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class,'index'])->middleware('is_admin');

Route::get('admin/dashboard', [DashboardController::class,'index'])->name('admin.dashboard.index')
->middleware('is_admin');

Route::resource('admin/kosan', KosanController::class)->middleware('is_admin');
Route::resource('admin/kriteria', KriteriaController::class)->middleware('is_admin');
Route::resource('admin/alternatif', AlternatifController::class)->middleware('is_admin');
Route::get('admin/hitung', [HitungController::class, 'hitung'])->name('hitung')->middleware('is_admin');

Auth::routes();

