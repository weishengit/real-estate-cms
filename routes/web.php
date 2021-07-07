<?php

use App\Http\Controllers\AmenityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SocialController;

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


// AUTH
Auth::routes();

// MAIN
Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/privacy', [PagesController::class, 'privacy'])->name('privacy');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::post('/contact', [PagesController::class, 'inquire'])->name('inquire');
Route::get('/properties', [PagesController::class, 'properties'])->name('properties');
Route::get('/properties/{property}', [PagesController::class, 'property'])->name('property');

// ADMIN
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/settings/privacy', [PrivacyController::class, 'edit'])->name('settings.privacy.edit');
    Route::put('/settings/privacy', [PrivacyController::class, 'update'])->name('settings.privacy.update');
    Route::get('/settings/contact', [ContactController::class, 'edit'])->name('settings.contact.edit');
    Route::put('/settings/contact', [ContactController::class, 'update'])->name('settings.contact.update');
    Route::get('/settings/social', [SocialController::class, 'edit'])->name('settings.social.edit');
    Route::put('/settings/social', [SocialController::class, 'update'])->name('settings.social.update');
    Route::get('/settings/site', [SiteController::class, 'edit'])->name('settings.site.edit');
    Route::put('/settings/site', [SiteController::class, 'update'])->name('settings.site.update');
    Route::get('/properties/checkslug', [PropertyController::class, 'checkSlug'])->name('properties.checkslug');
    Route::put('/properties/{property}/restore', [PropertyController::class, 'restore'])->name('properties.restore');
    Route::resource('properties', PropertyController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('amenities', AmenityController::class);
});

