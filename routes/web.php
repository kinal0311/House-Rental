<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('login.post');

Route::group(['middleware' => 'auth'], function () {
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('register', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('account', [AuthController::class, 'myAccount'])->name('account')->middleware('auth');
Route::post('account', [AuthController::class, 'updateAccount'])->name('account.update')->middleware('auth');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('login', [AdminController::class, 'login'])->name('login');

Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('get-data', [AdminController::class, 'getData'])->name('admin.get.data');
    Route::get('admin-create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('admin-store', [AdminController::class, 'store'])->name('store');
    Route::delete('admin-user/{id}', [AdminController::class, 'destroy'])->name('destroy');
    Route::get('admin-edit/{id}', [AdminController::class, 'adminEdit'])->name('edit');
    Route::post('admin-update/{id}', [AdminController::class, 'update'])->name('update');
    Route::get('admin-view/{id}', [AdminController::class, 'show'])->name('view');


    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::post('user-getdata', [UserController::class, 'getData'])->name('user.user-getdata');
    Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('user-edit/{id}', [UserController::class, 'userEdit'])->name('user.edit');
    Route::post('user-update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('user-view/{id}', [UserController::class, 'show'])->name('user.view');

    Route::get('agent', [UserController::class, 'index'])->name('agent.index');
    Route::post('agent-getdata', [UserController::class, 'getData'])->name('agent.agent-getdata');
    Route::delete('agent/{id}', [UserController::class, 'destroy'])->name('agent.destroy');
    Route::get('agent-edit/{id}', [UserController::class, 'agentEdit'])->name('agent.edit');
    Route::post('agent-update/{id}', [UserController::class, 'update'])->name('agent.update');
    Route::get('agent-view/{id}', [UserController::class, 'show'])->name('agent.view');


    Route::get('properties', [PropertyController::class, 'index'])->name('properties.index');
    Route::get('create', [PropertyController::class, 'create'])->name('properties.create');
    Route::post('store', [PropertyController::class, 'store'])->name('properties.store');
    // Route::get('store', [PropertyController::class, 'store'])->name('properties.store');
    Route::post('getData', [PropertyController::class, 'getData'])->name('properties.getData');
    Route::delete('property/{id}', [PropertyController::class, 'destroy'])->name('properties.destroy');
    Route::get('edit/{id}', [PropertyController::class, 'propertyEdit'])->name('properties.edit');
    Route::post('update/{id}', [PropertyController::class, 'update'])->name('properties.update');
    Route::get('property-view/{id}', [PropertyController::class, 'show'])->name('properties.view');

});


?>
