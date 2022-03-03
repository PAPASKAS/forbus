<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);

Route::get('/settings', [SettingsController::class, 'index'])->name('settingsIndex');
Route::put('/settings', [SettingsController::class, 'update'])->name('settingsUpdate');

Route::get('/users/{login}', [UsersController::class, 'show'])->name('usersShow');

Route::resource('/questions', QuestionsController::class)->except([
    'index', 'destroy'
]);

Route::resource('/comments', CommentsController::class)->except([
   'index', 'show', 'create', 'edit'
]);

require __DIR__.'/auth.php';
