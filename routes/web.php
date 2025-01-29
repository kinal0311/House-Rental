<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyImgController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\website\LayoutController;

Route::get('/', [LayoutController::class, 'index']);

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('login.post');

Route::group(['middleware' => 'auth'], function () {
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('register', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('master', [AuthController::class, 'master'])->name('master')->middleware('auth');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('account', [AuthController::class, 'myAccount'])->name('account')->middleware('auth');
Route::post('account', [AuthController::class, 'updateAccount'])->name('account.update')->middleware('auth');
});

Route::get('master', [MasterController::class, 'index'])->name('master');
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
    Route::post('/adminChange-status/{id}', [AdminController::class, 'adminChangeStatus'])->name('adminChangeData');

    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::post('user-getdata', [UserController::class, 'getData'])->name('user.user-getdata');
    Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('user-edit/{id}', [UserController::class, 'userEdit'])->name('user.edit');
    Route::post('user-update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('user-view/{id}', [UserController::class, 'show'])->name('user.view');
    Route::post('/userChange-status/{id}', [UserController::class, 'userChangeStatus'])->name('userChangeData');

    Route::get('agent', [AgentController::class, 'index'])->name('agent.index');
    Route::post('agent-getdata', [AgentController::class, 'agentgetData'])->name('agent.agent-getdata');
    Route::delete('agent/{id}', [AgentController::class, 'destroy'])->name('agent.destroy');
    Route::get('agent-edit/{id}', [AgentController::class, 'agentEdit'])->name('agent.edit');
    Route::post('agent-update/{id}', [AgentController::class, 'update'])->name('agent.update');
    Route::get('agent-view/{id}', [AgentController::class, 'show'])->name('agent.view');
    Route::post('/agentChange-status/{id}', [AgentController::class, 'agentChangeStatus'])->name('agentChangeData');

    Route::get('properties', [PropertyController::class, 'index'])->name('properties.index');
    Route::get('create', [PropertyController::class, 'create'])->name('properties.create');
    Route::post('store', [PropertyController::class, 'store'])->name('properties.store');
    // Route::get('store', [PropertyController::class, 'store'])->name('properties.store');
    Route::post('getData', [PropertyController::class, 'getData'])->name('properties.getData');
    Route::delete('property/{id}', [PropertyController::class, 'destroy'])->name('properties.destroy');
    Route::get('edit/{id}', [PropertyController::class, 'propertyEdit'])->name('properties.edit');
    Route::post('update/{id}', [PropertyController::class, 'update'])->name('properties.update');
    Route::get('property-view/{id}', [PropertyController::class, 'show'])->name('properties.view');

    Route::get('property_Img', [PropertyImgController::class, 'index'])->name('property_image.index');
    Route::get('img_create', [PropertyImgController::class, 'create'])->name('property_image.create');
    Route::post('img_store', [PropertyImgController::class, 'store'])->name('property_image.store');
    Route::post('img_getData', [PropertyImgController::class, 'getData'])->name('property_image.getData');
    Route::delete('property_image/{id}', [PropertyImgController::class, 'destroy'])->name('property_image.destroy');
    Route::get('image-edit/{id}', [PropertyImgController::class, 'imageEdit'])->name('property_image.edit');
    Route::post('image-update/{id}', [PropertyImgController::class, 'update'])->name('property_image.update');
    Route::get('image-view/{id}', [PropertyImgController::class, 'show'])->name('property_image.view');

});

// Route::get('layout', [LayoutController::class, 'index'])->name('layout');
Route::get('layout', [LayoutController::class, 'index'])->name('layout');

?>
