<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvaluationController;

Route::get('/', [EvaluationController::class, 'create'])->name('evaluation.create');
Route::post('/submit', [EvaluationController::class, 'store'])->name('evaluation.store');
