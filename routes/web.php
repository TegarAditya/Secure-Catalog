<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;

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


Route::get('/', function () {
    return view('welcome');
});


//GUEST
Route::middleware('guest')->group(function () {

    //login&register
    Route::get('/login', [AuthController::class, 'indexlogin'])->name('login');
    Route::get('/register', [AuthController::class, 'indexregister'])->name('register');

    //post login&register
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

//LOGIN
Route::middleware('auth')->group(function () {

    //logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //USER DAN ADMIN
    Route::middleware('notfor:superadmin')->group(function () {

        //katalog
        Route::get('/dashboard', [PageController::class, 'katalog'])->name('dashboard');
        Route::get('/dashboard/produk/{id}', [PageController::class, 'detail'])->name('dashboard.produk');
    });

    //ADMIN DAN SUPERADMIN
    Route::middleware('notfor:user')->group(function () {

        //produk
        Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
        Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
        Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');
        Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');

        //crud produk
        Route::post('/produk/create', [ProdukController::class, 'store']);
        Route::put('/produk/{id}/edit', [ProdukController::class, 'update']);
        Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);
    });

    //SUPERADMIN
    Route::middleware(['notfor:user','notfor:admin'])->group(function () {
        //laporan
        Route::get('/laporan', [PageController::class, 'laporan'])->name('laporan');

        //user
        Route::get('/user', [UserController::class, 'index'])->name('user');
        Route::get('/user/{id}', [UserController::class, 'show']);
        Route::get('/user/{id}/edit', [UserController::class, 'edit']);

        //crud user
        Route::put('/user/{id}/edit', [UserController::class, 'update']);
        Route::delete('/user/{id}', [UserController::class, 'destroy']);
    });

});

//-------------------------------------------------------------------
// User
//-------------------------------------------------------------------
// > Katalog   | (url : /dashboard)
// > Logout    | (url : /logout)
//             |
//             |
//             |
//-------------------------------------------------------------------

//-------------------------------------------------------------------
// Admin
//-------------------------------------------------------------------
// > Dashboard | (url : /dashboard) -> katalog 
// > Produk    | (url : /produk) -> crud produk
// > Logout    | (url : /logout)
//             |
//             |
//             |
//-------------------------------------------------------------------

//-------------------------------------------------------------------
// Super Admin
//-------------------------------------------------------------------
// > Dashboard | (url: /dashboard) -> laporan
// > Produk    | (url: /produk) -> crud produk
// > User      | (url: /user) -> crud user/admin
// > Logout    | (url: /logout)
//             |
//             |
//             |
//-------------------------------------------------------------------