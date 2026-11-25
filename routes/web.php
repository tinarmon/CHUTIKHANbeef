<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('drafts.nasa', ['p' => config('portfolio')]))->name('home');
Route::redirect('/nasa', '/', 301)->name('draft.nasa');

if (app()->environment(['local', 'testing']) || config('portfolio.enable_apple_draft')) {
    Route::get('/apple', fn () => view('drafts.apple', ['p' => config('portfolio')]))->name('draft.apple');
}
