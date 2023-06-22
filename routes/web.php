<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\BusinessController;
use App\Http\Controllers\User\HobbyController;
use App\Http\Controllers\User\StudyController;
use App\Http\Controllers\User\TradeController;
use App\Http\Controllers\User\OthersController;
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
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update/{id}', 'update')->name('update');
    Route::post('/destroy/{id}', 'destroy')->name('destroy');

    Route::get('/show-project/{id}', 'showProject')->name('show-project');
    Route::get('/edit-project/{id}', 'editProject')->name('edit-project');
    Route::put('/update-project/{id}', 'updateProject')->name('update-project');
    Route::delete('/destroy/{id}', 'destroyProject')->name('destroy-project');
});

Route::prefix('user_business')
->middleware('auth:users')
->name('business.')
->controller(BusinessController::class)
->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::post('/destroy/{id}', 'destroy')->name('destroy');

    // Route::get('/show-project/{id}', 'showProject')->name('show-project');
});

Route::prefix('user_hobby')
->middleware('auth:users')
->name('hobby.')
->controller(HobbyController::class)
->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::post('/destroy/{id}', 'destroy')->name('destroy');

    // Route::get('/show-project/{id}', 'showProject')->name('show-project');
});

Route::prefix('user_study')
->middleware('auth:users')
->name('study.')
->controller(StudyController::class)
->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::post('/destroy/{id}', 'destroy')->name('destroy');

    // Route::get('/show-project/{id}', 'showProject')->name('show-project');
});

Route::prefix('user_trade')
->middleware('auth:users')
->name('trade.')
->controller(TradeController::class)
->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::post('/destroy/{id}', 'destroy')->name('destroy');

    // Route::get('/show-project/{id}', 'showProject')->name('show-project');
});

Route::prefix('user_others')
->middleware('auth:users')
->name('others.')
->controller(OthersController::class)
->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::post('/destroy/{id}', 'destroy')->name('destroy');

    // Route::get('/show-project/{id}', 'showProject')->name('show-project');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users'])->name('dashboard');

require __DIR__.'/auth.php';

