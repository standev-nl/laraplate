<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

// Dashboard
//Breadcrumbs::for('home', function ($trail) {
//    $trail->push('<i class="far fa-home-alt"></i> Home', route('backend.dashboard'));
//});

// Dashboard > Dashboard
Breadcrumbs::for('about', function ($trail) {
    $trail->parent('home');
    $trail->push('Dashboard', route('backend.dashboard'));
});

//// Home > Blog
//Breadcrumbs::for('blog', function ($trail) {
//    $trail->parent('home');
//    $trail->push('Blog', route('blog'));
//});
//
//// Home > Blog > [Category]
//Breadcrumbs::for('category', function ($trail, $category) {
//    $trail->parent('blog');
//    $trail->push($category->title, route('category', $category->id));
//});
//
//// Home > Blog > [Category] > [Post]
//Breadcrumbs::for('post', function ($trail, $post) {
//    $trail->parent('category', $post->category);
//    $trail->push($post->title, route('post', $post->id));
//});

