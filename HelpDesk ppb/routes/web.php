<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;

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

// Auth routes
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/signup', [AuthController::class, 'showRegister'])->name('register');
Route::post('/signup', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Daftar semua tiket untuk admin
    Route::get('/tiket-list', [TicketController::class, 'list'])->name('ticket.list');
    // Halaman yang hanya bisa diakses oleh user yang sudah login
    Route::get('/home', [TicketController::class, 'home'])->name('home');
    Route::get('/homeAdmin', [TicketController::class, 'home'])->name('home.admin');
    Route::get('/ticket', [TicketController::class, 'index'])->name('ticket.index');
    Route::get('/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
    Route::post('/ticket', [TicketController::class, 'store'])->name('ticket.store');
    Route::get('/ticket/{id}', [TicketController::class, 'show'])->name('ticket.show');
    Route::post('/ticket/{id}/jawab', [TicketController::class, 'jawab'])->name('ticket.jawab');
    Route::get('/ticket/{id}/edit', [TicketController::class, 'edit'])->name('ticket.edit');
    Route::put('/ticket/{id}', [TicketController::class, 'update'])->name('ticket.update');
    Route::delete('/ticket/{id}', [TicketController::class, 'destroy'])->name('ticket.destroy');
    Route::post('/ticket/{id}/selesai', [TicketController::class, 'selesai'])->name('ticket.selesai');
    Route::get('/report', function () {
        return view('main.report');
    });
    // Route::get('/result', function () {
    //     return view('main.result');
    // });
    Route::get('/history', function () {
        return view('main.history');
    });
});
Route::get('/cek-session', function () {
    return [
        'login?' => Auth::check(),
        'user' => Auth::user(),
        'session_id' => session()->getId(),
        'cookie' => request()->cookie(),
    ];
});
