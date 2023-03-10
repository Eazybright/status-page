<?php

use Illuminate\Support\Facades\Route;

use Eazybright\StatusPage\Http\Controllers\StatusPageController;

Route::get('/status-page', [StatusPageController::class, 'index'])->name('status-page.index');