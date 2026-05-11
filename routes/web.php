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

Route::get('/evaluation-gratuite', function () {
    return Inertia::render('Evaluation');
})->name('evaluation-gratuite');

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

Route::get('/services/gatineau-ottawa', function () {
    return Inertia::render('services/GatineauOttawa');
})->name('gatineau-ottawa');

Route::get('/services/secteur-aylmer', function () {
    return Inertia::render('services/SecteurAylmer');
})->name('secteur-aylmer');

Route::get('/services/secteur-hull', function () {
    return Inertia::render('services/SecteurHull');
})->name('secteur-hull');

Route::get('/services/secteur-wakefield', function () {
    return Inertia::render('services/SecteurWakefield');
})->name('secteur-wakefield');

Route::get('/services/region-de-l-outaouanis-et-pontiac', function () {
    return Inertia::render('services/RegionDeOutaouanis');
})->name('region-de-l-outaouanis-et-pontiac');

Route::get('/services/secteur-chelsea', function () {
    return Inertia::render('services/SecteurChelsea');
})->name('secteur-chelsea');

Route::get('/services/secteur-buckingham-masson-angers', function () {
    return Inertia::render('services/SecteurBuckingham');
})->name('secteur-buckingham-masson-angers');

Route::get('/services/acheter-une-maison-avec-un-mauvais-credit', function () {
    return Inertia::render('services/BuyingWithBadCredit');
})->name('acheter-une-maison-avec-un-mauvais-credit');

Route::get('/services/reprise-de-possession', function () {
    return Inertia::render('services/Reprossesion');
})->name('reprise-de-possession');

Route::get('/services/un-service-de-courtier-immobilier', function () {
    return Inertia::render('services/WhyRealEstateBroker');
})->name('un-service-de-courtier-immobilier');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'admin/Dashboard')->name('dashboard');
    Route::inertia('enquiries', 'admin/Enquiries')->name('enquiries');
    Route::inertia('listing', 'admin/Listing')->name('listing');
    Route::inertia('evaluation', 'admin/Evaluation')->name('evaluation');
});

require __DIR__.'/settings.php';
