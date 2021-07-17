<?php

use StanDev\Laraplate\Http\Controllers\backend\UserController;
use Diglactic\Breadcrumbs\Breadcrumbs;

// Users index
Breadcrumbs::for('users.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Gebruikers', route('backend.users.index'));
});

// Users create
Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users.index');
    $trail->push('Gebruiker toevoegen', route('backend.users.create'));
});

// Users show
Breadcrumbs::for('users.show', function ($trail, $user) {
    $trail->parent('users.index');
    $trail->push($user->firstname .' '. $user->lastname, route('backend.users.show', $user));

});

// Users edit
Breadcrumbs::for('users.edit', function ($trail, $user) {
    $trail->parent('users.index');
    $trail->push($user->firstname .' '. $user->lastname, route('backend.users.edit', $user));
});

// Routes
Route::middleware(['role:super-admin'])->group(function () {

    // User Controller
    Route::resource('users', UserController::class);

});
