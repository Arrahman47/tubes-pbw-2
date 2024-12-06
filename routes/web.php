<?php
  
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
   
Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('home');
});
Route::get('/logout', [UserController::class, 'logout']);
Route::post('/orders/{id}/accept', [ProductController::class, 'accept'])->name('orders.accept');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('promos', PromoController::class);
   /* Route::post('/orders/{id}/pay', [ProductController::class, 'updatePaymentStatus'])->name('orders.pay'); */
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

});
require __DIR__.'/auth.php';