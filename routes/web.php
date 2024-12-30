<?php
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
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
Route::put('/products/{id}/accept', [ProductController::class, 'accept'])->name('products.accept');
Route::put('/payments/{id}/accept', [PaymentController::class, 'accept'])->name('payments.accept');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);



    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::delete('/payments/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');
   /* Route::post('/orders/{id}/pay', [ProductController::class, 'updatePaymentStatus'])->name('orders.pay'); */
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::put('products/{id}/reject', [ProductController::class, 'reject'])->name('products.reject');
    Route::get('products/{id}/generate-word-invoice', [ProductController::class, 'generateWordInvoice'])->name('products.generateWordInvoice');
    Route::resource('products', ProductController::class);

});
Route::get('/auth/redirect', [SocialiteController::class, 'redirect']);
Route::get('/auth/google/callback', [SocialiteController::class, 'callback']);  



require __DIR__.'/auth.php';