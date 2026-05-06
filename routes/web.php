<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/profil', function () {
    return Inertia::render('Profile');
})->name('profil');

Route::get('/services', function () {
    return Inertia::render('Services');
})->name('services');

Route::get('/properietes', function () {
    return Inertia::render('Properties');
})->name('properties');

Route::get('/prestige', function () {
    return Inertia::render('Prestige');
})->name('prestige');

Route::get('/parc-immoblier', function () {
    return Inertia::render('RealEstatePortfolio');
})->name('real-estate-portfolio');

Route::get('/blogue', function () {
    return Inertia::render('Blog');
})->name('blog');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'admin/Dashboard')->name('dashboard');
    Route::inertia('enquiries', 'admin/Enquiries')->name('enquiries');
     Route::inertia('listing', 'admin/Listing')->name('listing');
});

require __DIR__.'/settings.php';
