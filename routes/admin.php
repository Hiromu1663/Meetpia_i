<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\AdminController;
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

// Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');


// Route::get('/', function () {
//     return view('admin.welcome');
// });

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth:admin'])->name('dashboard');

Route::middleware('auth:admin')
->controller(AdminController::class)
->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/event', 'search')->name('event');
    Route::get('/show/{user}', 'show')->name('show');
    Route::get('/show_project/{user}', 'showProject')->name('show_project');
    Route::delete('/destroy/{user}', 'destroy')->name('destroy');
    Route::delete('/destroy_project/{id}', 'destroyProject')->name('destroy_project');

    // 削除されたユーザー
    // Route::get('delete-users','deletedUserIndex')->name('deleted-users.index');
    // Route::get('delete-users/show/{user}', 'deletedUserShow')->name('deleted-users.show');
    // Route::get('delete-users/destroy/{user}', 'deletedUserDestroy')->name('deleted-users.destroy');
    // Route::get('delete-users/{user}/restore', 'deletedUserRestore')->name('deleted-users.restore');
});

// 削除されたユーザー
Route::prefix('deleted-users')
->middleware('auth:admin')
->controller(AdminController::class)
->name('deleted-users.')
->group(function(){
    Route::get('/','deletedUserIndex')->name('index');
    Route::get('/show/{user}', 'deletedUserShow')->name('show');
    Route::get('/destroy/{user}', 'deletedUserDestroy')->name('destroy');
    Route::get('/restore/{user}', 'deletedUserRestore')->name('restore');
});

// 削除されたイベント
Route::prefix('deleted_project')
->middleware('auth:admin')
->controller(AdminController::class)
->name('deleted_project.')
->group(function(){
    Route::get('/','deletedProjectIndex')->name('index');
    Route::get('/show/{user}', 'deletedProjectShow')->name('show');
    Route::delete('/destroy/{id}', 'deletedProjectDestroy')->name('destroy');
    Route::get('/restore/{id}', 'deletedProjectRestore')->name('restore');
});




Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});

