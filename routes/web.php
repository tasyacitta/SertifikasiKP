<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendasController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::get('/', [AgendasController::class, 'index']); //routing ke halaman homepage
Route::post('/agendas/create', [AgendasController::class, 'create']); //routing ke bagian tambah data
Route::get('/agendas/{id}/edit',[AgendasController::class, 'edit']); //routing ke halaman edit data
Route::post('/agendas/{id}/update',[AgendasController::class, 'update']); //routing ke update data
Route::get('/agendas/{id}/delete',[AgendasController::class, 'delete']); //routing ke bagian hapus