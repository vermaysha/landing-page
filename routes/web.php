<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])
    ->group(function () {
        Route::get('/', function () {
            return view('landing-page.home.home');
        })->name('home');

        Route::get('/portfolio', function () { return view('landing-page.portfolio.portfolio');})
            ->name('portfolio');
        Route::get('/pricing', function () { return view('landing-page.pricing.pricing');})
            ->name('pricing');

        Route::get('/template', function () { return view('landing-page.template.template');})
            ->name('template');
    });
