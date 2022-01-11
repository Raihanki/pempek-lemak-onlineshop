<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::middleware(['auth', 'auth-admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('admin.dashboard');

//  user management
    Route::get('/user-management', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user-management.index');
    Route::get('/user-management/tambah', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.user-management.add');
    Route::post('/user-management/store', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.user-management.store');
    Route::delete('/user-management/{user:id}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.user-management.destroy');
    Route::get('/user-management/{user:id}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.user-management.edit');
    Route::patch('/user-management/{user:id}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user-management.update');

//  Product Routes
    Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);
//  Kategori Routes
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);
//  Cart Routes
    Route::get('/keranjang', [\App\Http\Controllers\Admin\CartController::class, 'index'])->name('cart.index');
    Route::get('/keranjang/edit');

//  Transaction Routes
    Route::get('/transaction', [\App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transaction.index');
    Route::get('/transaction/{id}/{status}', [\App\Http\Controllers\Admin\TransactionController::class, 'ubahStatusBarang'])->name('ubah-status');
});

Route::middleware('auth')->group(function () {
    Route::post('/produk/{slug}/add-to-cart', [\App\Http\Controllers\Customer\ProdukController::class, 'addToCart'])->name('produk.cart');
    Route::delete('/produk/{id}/deletecart', [\App\Http\Controllers\Customer\ProdukController::class, 'deleteCart'])->name('produk.deletecart');
    Route::get('/keranjang',[\App\Http\Controllers\Customer\ProdukController::class, 'cart'])->name('keranjang');

    //cekongkir
    Route::post('/checkout', [\App\Http\Controllers\Checkout\OngkirController::class, 'index'])->name('cekongkir');
    Route::post('/checkout/provinsi/', [\App\Http\Controllers\Checkout\OngkirController::class, 'getCities'])->name('cekongkir-city');
    Route::post('/chechout/ongkir/', [\App\Http\Controllers\Checkout\OngkirController::class, 'pilihOngkir'])->name('pilih-ongkir');
    Route::post('/chechout/ongkir/oke', [\App\Http\Controllers\Checkout\OngkirController::class, 'checkOngkir'])->name('ongkir-oke');

    Route::post('/checkout/produk/beli/', [\App\Http\Controllers\Checkout\OngkirController::class, 'saveData'])->name('saveData');
    Route::get('/transaksi/histori', [\App\Http\Controllers\Customer\TransactionController::class, 'index'])->name('transaksi');
    Route::get('/transaksi/detail', [\App\Http\Controllers\Customer\TransactionController::class, 'detail'])->name('detail-transaksi');

    Route::post('/transaksi/metode_pembayaran', [\App\Http\Controllers\Checkout\PaymentController::class, 'pilihPembayaran'])->name('pilih-pembayaran');
    Route::get('/detail-transaksi/{id}', [\App\Http\Controllers\Checkout\PaymentController::class, 'detailTransaksi'])->name('detail-transaksi-user');
});

Route::get('/menu', [\App\Http\Controllers\Customer\ProdukController::class, 'menu'])->name('menu');


Route::get('/menu/{slug}', [\App\Http\Controllers\Customer\ProdukController::class, 'detail'])->name('detail-menu');

