<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [FrontendController::class, 'index'])->name('/index');
Route::get('/user/login', [FrontendController::class, 'user_login'])->name('user.login');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/developers', [FrontendController::class, 'developers'])->name('developers');
Route::get('/members', [FrontendController::class, 'members'])->name('members');
Route::get('/dashboard', [FrontendController::class, 'dashboard'])->name('dashboard');


Route::middleware(['auth', 'isAdmin'])->group(function () {
    // route for developer 
    Route::resource('/developer', DeveloperController::class);

    // route for member 
    Route::get('/member', [MemberController::class, 'member'])->name('/member');
    Route::post('/add/member', [MemberController::class, 'add_member'])->name('add.member');
    Route::post('/update/member', [MemberController::class, 'update_member'])->name('update.member');
    Route::post('/delete/member', [MemberController::class, 'delete_member'])->name('delete.member');
});
