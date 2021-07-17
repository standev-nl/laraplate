<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

// Dashboard
Breadcrumbs::for('home', function ($trail) {
    $trail->push('<i class="far fa-home-alt"></i> Home', route('backend.dashboard'));
});

//Route::group(['middleware' => ['can:access backend']], function () {

    Route::get('/dashboard', function () {
        return view('laraplate::backend.dashboard');
    })->middleware(['auth'])->name('dashboard');

//});
