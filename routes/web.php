<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\User\JoinController;
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
// Route::get('/', function () {
//     return view('welcome.welcome-index');
// });

Route::get('/', [WelcomeController::class, 'index']);

Route::prefix('user')
->middleware('auth:users')
->controller(UserController::class)
->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
    Route::delete('/destroy/{id}', 'destroy')->name('destroy');
    // Projectの詳細表示
    Route::get('/show-project/{id}', 'showProject')->name('show_project');
    // Projectの編集,削除
    Route::get('/edit-project/{id}', 'editProject')->name('edit-project');
    Route::put('/update-project/{id}', 'updateProject')->name('update-project');
    Route::delete('/destroy/{id}', 'destroyProject')->name('destroy-project');
    // Introductionのみ編集
    Route::get('/editIntroduction/{id}', 'editIntroduction')->name('editIntroduction');
    Route::put('/updateIntroduction/{id}', 'updateIntroduction')->name('updateIntroduction');
    // Avatarのみ編集
    Route::get('/editAvatar/{id}', 'editAvatar')->name('editAvatar');
    Route::put('/updateAvatar/{id}', 'updateAvatar')->name('updateAvatar');
    // Review
    Route::get('/review/{id}', 'createReview')->name('create_review');
    Route::post('/store_review/{id}', 'storeReview')->name('store_review');
    // Contactの入力,確認,送信
    Route::get('/contact/form/{project_id}', 'contactForm')->name('contact_form');
    Route::post('/contact/confirm/{project_id}', 'contactConfirm')->name('contact_confirm');
    Route::post('/contact/thanks/{project_id}', 'contactSend')->name('contact_send');
    Route::get('/contact/list/{id}', 'contactIndex')->name('contact_index');
    Route::get('/contact/show/{id}', 'contactShow')->name('contact_show');
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

// favorite機能
Route::prefix('favorite')
->middleware('auth:users')
->controller(FavoriteController::class)
->group(function(){
    Route::get('/toggle/{id}', 'toggle');
});



Route::prefix('join')
->middleware('auth:users')
// ->name('join.')
->controller(JoinController::class)
->group(function(){
    Route::get('/toggle/{id}', 'toggle');
});






Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users'])->name('dashboard');

require __DIR__.'/auth.php';

