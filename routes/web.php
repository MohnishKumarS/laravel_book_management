<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [UserController::class,'index']);
Route::get('/mybooks', [UserController::class,'myBooks']);

Route::controller(BookController::class)->group(function(){
    Route::get('/create-book', 'create_book')->name('book.create');
    Route::post('/store-book', 'store_book')->name('book.store');
    Route::get('/edit-book/{id}', 'edit_book')->name('book.edit');
    Route::put('/update-book/{id}', 'update_book')->name('book.update');
});

// admin panel
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('dashboard');
    Route::get('all-books',[AdminController::class,'showAllBooks'])->name('admin.all-books');
    Route::delete('delete-book/{id}',[AdminController::class,'deleteBook'])->name('admin.deleteBook');
    Route::get('users',[AdminController::class,'allUsers'])->name('admin.users');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/clear', function() {
   
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    // Artisan::call('optimize');
 
    return "Cleared!";
 
 });
 
 
 Route::fallback(function () {
    return view('404');
 });
 
