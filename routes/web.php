<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoAlbumController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('index');
});

Route::get('/about_me', function () {
    return view('about_me');
});

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/contact/success', [ContactController::class, 'success'])->name('contact.success');

Route::get('/history', function () {
    return view('history');
});

Route::get('/interests', [InterestController::class, 'getInterest']);

Route::get('/photoalbom', [PhotoAlbumController::class, 'index']);

Route::get('/study', function () {
    return view('study');
});

Route::get('/test', [TestController::class, 'showForm'])->name('test.show');
Route::post('/test', [TestController::class, 'submit'])->name('test.submit');
Route::get('/test/success', [TestController::class, 'success'])->name('test.success');