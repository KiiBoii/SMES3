<?php

use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Route;


Route::get('/faq', [FaqController::class, 'index']);
Route::post('/faq', [FaqController::class, 'store']);

?>
