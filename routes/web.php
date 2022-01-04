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
    return view('site.home');
})->name('home');

use App\Http\Controllers\Site\LoginController as SiteLoginController;
Route::get('login', [SiteLoginController::class, 'index'])->name('login');
Route::post('login', [SiteLoginController::class, 'login'])->name('login.seller'); 
Route::get('logout', [SiteLoginController::class, 'signOut'])->name('logout');

use App\Http\Controllers\Site\RegisterController as SiteRegisterController;
Route::get('registration', [SiteRegisterController::class, 'index'])->name('register');
Route::post('registration', [SiteRegisterController::class, 'register'])->name('register.seller'); 

// use App\Http\Controllers\Site\ProductController as SiteProductController;

Route::group(['prefix'=>'seller','middleware' => 'auth'], function() {
    Route::get('/account', [App\Http\Controllers\Site\AccountController::class, 'index'])->name('myAccount');
    Route::post('/social-account/update', [App\Http\Controllers\Site\AccountController::class, 'socialUpdate'])->name('socialAccount.update');
    Route::post('/password/update', [App\Http\Controllers\Site\AccountController::class, 'passwordUpdate'])->name('password.update');
    Route::post('/account/update', [App\Http\Controllers\Site\AccountController::class, 'accountUpdate'])->name('account.update');
    Route::get('/certificate/delete/{image}', [App\Http\Controllers\Site\AccountController::class, 'deleteCertificate']);
    Route::get('/profile', [App\Http\Controllers\Site\ProfileController::class, 'index'])->name('myProfile');
    Route::get('/product/add', [App\Http\Controllers\Site\ProductController::class, 'index'])->name('product.add');
    Route::post('/product/store', [App\Http\Controllers\Site\ProductController::class, 'store'])->name('product.store');
    Route::get('/product/sub-categories/{category_id}', [App\Http\Controllers\Site\ProductController::class, 'getSubcategories']);
    Route::get('/product/edit/{id}', [App\Http\Controllers\Site\ProductController::class, 'edit']);
    Route::post('/product/update', [App\Http\Controllers\Site\ProductController::class, 'update']);

});

//    Admin Routes

Route::prefix('admin')->group(function () {
    Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'index']);
    Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login']);
});
Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function() {
    Route::get('/logout', [App\Http\Controllers\Admin\LoginController::class, 'signOut']);
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('/seller', [App\Http\Controllers\Admin\SellerController::class, 'index']);
    Route::get('/seller/edit/{id}', [App\Http\Controllers\Admin\SellerController::class, 'edit']);
    Route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('/categories/add', [App\Http\Controllers\Admin\CategoryController::class, 'add']);
    Route::post('/category/store', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::post('/category/update', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('/category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete']);
    Route::get('/products', [App\Http\Controllers\Admin\ProductController::class, 'index']);
    Route::get('/product/edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit']);
    Route::post('/product/update', [App\Http\Controllers\Admin\ProductController::class, 'update']);
});
