<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Switch between languages
 */
//Route::get('lang/{lang}', [LocaleController::class, 'switchLang'])->name('lang.switch');

/**
 * Include front-end routing
 */
Route::as('frontend.')->group(function () {
    includeRouteFiles(__DIR__ . '/frontend/');
});

/**
 * Include back-end routing
 */
Route::as('backend.')->prefix('admin')->group(function () {
    includeRouteFiles(__DIR__ . '/backend/');
});

Route::get('laraplate-assets', [])->name('laraplate_assets');


// @TODO: Fix redirect if user is not signed in.
Route::get('/', function (){
    return redirect()->route('backend.login');
})->name('login');
