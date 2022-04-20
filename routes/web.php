<?php

use App\Http\Controllers\Home\HomeController;
// use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Home\LoginUserController;
use Illuminate\Support\Facades\Route;

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
/**
 * password vừa chữ vừa số
 */

Route::pattern('id', '[0-9]+');
Route::pattern('slug', ('.*'));

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/login', function () {
//     return view('login');
// });
// Route::get('/booking_meeting_room', function () {
//     return view('booking_meeting_room');
// });

Route::prefix('/')->group(function () {
    Route::middleware(['auth:web'])->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home.index');
        Route::match(['get', 'post'], '/book/{id}', [HomeController::class, 'book'])->name('home.book');
    });
    
});

Route::match(['get', 'post'], '/login', [LoginUserController::class, 'loginUser'])->name('login');
Route::post('/logout', [LoginUserController::class, 'logoutUser'])->name('logout.user');


//User
Route::prefix('/admin')->group(function(){
    Route::middleware(['auth:web'])->group(function(){
        Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('admin.login');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('/user/index', [UserController::class, 'userIndex'])->name('admin.index');
        Route::get('/user/add', [UserController::class, 'showAddUser'])->name('get.admin.add');
        Route::post('/user/add', [UserController::class, 'addUser'])->name('post.admin.add');
        Route::get('edit-user/{id}', [UserController::class, 'showEditUser']);
        Route::put('update-user/{id}', [UserController::class, 'editUser']);
        Route::get('delete-user/{id}', [UserController::class, 'deleteUser']);
    });
});


