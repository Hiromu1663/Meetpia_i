<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\User\UserController;
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

// Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');
// Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
// Route::resource('user/bookmark', BookmarkController::class);
// Route::resource('user/comment', CommentController::class);


// Route::prefix('admin')
// ->middleware('auth')
// ->name('admin.')
// ->group(function(){
//     Route::get('index', [AdminController::class, 'index'])->name('index');
//     Route::get('destroy/{owner}', [OwnersController::class, 'destroy'])->name('destroy');
// });



//誰でも見れるトップページ
Route::get('/', function () {
    return view('welcome.welcome-index');
});

Route::prefix('user')
->middleware('auth:users')
->controller(UserController::class)
->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::post('/{id}/destroy', 'destroy')->name('destroy');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users'])->name('dashboard');

require __DIR__.'/auth.php';
