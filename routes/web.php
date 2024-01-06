<?php

use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PlanController;
use App\Http\Controllers\Dashboard\PortfolioController;
use App\Http\Controllers\Dashboard\TestimonialController;
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

Route::middleware([])
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

Route::middleware(['auth'])
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {
        Route::controller(HomeController::class)
            ->group(function () {
                Route::get('/', 'index')->name('home');
            });

        Route::controller(TestimonialController::class)
            ->prefix('testimonial')
            ->name('testimonial.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::post('/toggle/{id}', 'toggle')->name('toggle');
                Route::post('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'delete')->name('delete');
            });

        Route::controller(PlanController::class)
            ->prefix('plan')
            ->name('plan.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::post('/toggle-popular/{id}', 'togglePopular')->name('togglePopular');
                Route::post('/toggle-show-on-homepage/{id}', 'toggleShowOnHomepage')->name('toggleShowOnHomepage');
                Route::post('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'delete')->name('delete');
            });

        Route::controller(PortfolioController::class)
            ->prefix('portfolio')
            ->name('portfolio.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::post('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'delete')->name('delete');
            });
    });

Route::controller(AuthController::class)
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {
        Route::get('/login', 'login')->name('login')->middleware('guest');
        Route::post('/login', 'authenticate')->name('login.post')->middleware('guest');
        Route::get('/logout', 'logout')->name('logout')->middleware('auth');
    });
