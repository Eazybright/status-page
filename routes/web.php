<?php

use Eazybright\StatusPage\Http\Controllers\StatusPageController;
use Illuminate\Support\Facades\Route;

Route::get('/status-page', [StatusPageController::class, 'index'])->name('status-page.index');
