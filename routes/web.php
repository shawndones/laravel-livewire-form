<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/form', function () {
    return view('form', ['livewireComponent' => true]);
})->name('form');
Route::get('/form-results', function () {
    $formData = session('formData', []);
    return view('form-results', compact('formData'));
})->name('form.results');
