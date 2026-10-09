<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Teams\TeamInvitationController;
use App\Http\Middleware\EnsureTeamMembership;
use App\Http\Controllers\FilmController;
use Illuminate\Support\Facades\Route;

Route::get('/films', [FilmController::class, 'index'])
    ->name('films.index');
    
Route::view('/profil-kelas', 'profil-kelas')->name('profil-kelas');

Route::inertia('/', 'welcome')->name('home');

// ===============================
// ROUTE BUKU
// ===============================

// Bisa diakses tanpa login
Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'index')->name('books.index');
    Route::get('/books/{id}', 'show')
        ->whereNumber('id')
        ->name('books.show');
});

// ===============================
// ROUTE KHUSUS TEAM
// ===============================

Route::prefix('{current_team}')
    ->middleware(['auth', 'verified', EnsureTeamMembership::class])
    ->group(function () {
        Route::get('dashboard', DashboardController::class)
            ->name('dashboard');
    });

// ===============================
// ROUTE YANG WAJIB LOGIN
// ===============================

Route::middleware(['auth'])->group(function () {

    Route::post(
        'invitations/{invitation}/accept',
        [TeamInvitationController::class, 'accept']
    )->name('invitations.accept');

    Route::delete(
        'invitations/{invitation}',
        [TeamInvitationController::class, 'decline']
    )->name('invitations.decline');

    // Tambah, edit, hapus buku
    Route::resource('books', BookController::class)
        ->except(['index', 'show']);
});