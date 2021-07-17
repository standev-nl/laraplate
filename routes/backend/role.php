<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

// Dashboard
Breadcrumbs::for('role.overview', function ($trail) {
    $trail->push('<i class="far fa-home-alt"></i> Rol overzicht', route('backend.dashboard'));
});

Route::middleware(['role:super-admin'])->name('role.')->prefix('role')->group(function () {

    Route::get('overview', function () {
        return view('backend.role.index');
    })->name('overview');

});
