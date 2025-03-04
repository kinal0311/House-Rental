<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyImgController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\website\LayoutController;
use App\Http\Controllers\website\SinglePropertyController;
use App\Http\Controllers\website\AgentProfileController;
use App\Http\Controllers\website\ListingController;
use App\Http\Controllers\website\AgentGridController;
use App\Http\Controllers\website\SalePropertyController;
use App\Http\Controllers\website\RentPropertyController;
use App\Http\Controllers\website\ContectController;
use App\Http\Controllers\website\SubmitPropertyController;
use App\Http\Controllers\website\LoginController;
use App\Http\Controllers\website\SignUpController;
use App\Http\Controllers\website\CartController;
use App\Http\Controllers\website\ProfileController;
use App\Http\Controllers\website\BookingController;
use App\Http\Controllers\website\WishlistController;
use App\Http\Controllers\website\FeedbackController;


// use App\Http\Middleware\CheckPermission;

Route::get('/', [LayoutController::class, 'index'])->name('home');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('login.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('register', [AuthController::class, 'postRegistration'])->name('register.post');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');

Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');

Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');

Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::group(['middleware' => 'auth'], function () {
});

// Route::get('master', [MasterController::class, 'index'])->name('master');
// Route::get('login', [AdminController::class, 'login'])->name('login');

Route::group([
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth:admin']
], function () {

    Route::get('master', [AuthController::class, 'master'])->name('master');
    Route::get('account', [AuthController::class, 'myAccount'])->name('account');
    Route::post('update-account', [AuthController::class, 'updateAccount'])->name('account.update');
    Route::get('dashboard', [MasterController::class, 'show'])->name('dashboard');
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('get-data', [AdminController::class, 'getData'])->name('admin.get.data');
    Route::get('admin-create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('admin-store', [AdminController::class, 'store'])->name('store');
    Route::delete('admin-user/{id}', [AdminController::class, 'destroy'])->name('destroy');
    Route::get('admin-edit/{id}', [AdminController::class, 'adminEdit'])->name('edit');
    Route::post('admin-update/{id}', [AdminController::class, 'update'])->name('update');
    Route::get('admin-view/{id}', [AdminController::class, 'show'])->name('view');
    // Route::post('admin/change-status/{id}', [AdminController::class, 'changeStatus'])->name('admin.changeStatus');
    Route::post('changeStatus/{id}', [AdminController::class, 'changeStatus'])->name('changeStatus');

    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::post('user-getdata', [UserController::class, 'getData'])->name('user.user-getdata');
    Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('user-edit/{id}', [UserController::class, 'userEdit'])->name('user.edit');
    Route::post('user-update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('user-view/{id}', [UserController::class, 'show'])->name('user.view');
    // Route::post('/userChange-status/{id}', [UserController::class, 'userChangeStatus'])->name('userChangeData');
    Route::post('userChangeStatus/{id}', [UserController::class, 'userChangeStatus'])->name('userChangeStatus');


    Route::get('agent', [AgentController::class, 'index'])->name('agent.index');
    Route::post('agent-getdata', [AgentController::class, 'agentgetData'])->name('agent.agent-getdata');
    Route::delete('agent/{id}', [AgentController::class, 'destroy'])->name('agent.destroy');
    Route::get('agent-edit/{id}', [AgentController::class, 'agentEdit'])->name('agent.edit');
    Route::post('agent-update/{id}', [AgentController::class, 'update'])->name('agent.update');
    Route::get('agent-view/{id}', [AgentController::class, 'show'])->name('agent.view');
    // Route::post('/agentChange-status/{id}', [AgentController::class, 'agentChangeStatus'])->name('agentChangeData');
    Route::post('agentChangeStatus/{id}', [AgentController::class, 'agentChangeStatus'])->name('agentChangeData');

    Route::get('properties', [PropertyController::class, 'index'])->name('properties.index');
    Route::get('create', [PropertyController::class, 'create'])->name('properties.create');
    Route::post('store', [PropertyController::class, 'store'])->name('properties.store');
    // Route::get('store', [PropertyController::class, 'store'])->name('properties.store');
    Route::post('getData', [PropertyController::class, 'getData'])->name('properties.getData');
    Route::delete('property/{id}', [PropertyController::class, 'destroy'])->name('properties.destroy');
    Route::get('edit/{id}', [PropertyController::class, 'propertyEdit'])->name('properties.edit');
    Route::post('update/{id}', [PropertyController::class, 'update'])->name('properties.update');
    Route::get('property-view/{id}', [PropertyController::class, 'show'])->name('properties.view');
    Route::post('propertyChangeStatus/{id}', [PropertyController::class, 'propertyChangeData'])->name('propertyChangeData');


    Route::get('payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::post('payment-getData', [PaymentController::class, 'paymentData'])->name('payment-getData');

    Route::get('review', [ReviewController::class, 'index'])->name('review.index');
    Route::post('review-getData', [ReviewController::class, 'reviewData'])->name('review-getData');
    Route::delete('review/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');


    // Route::get('property_Img', [PropertyImgController::class, 'index'])->name('property_image.index');
    // Route::get('img_create', [PropertyImgController::class, 'create'])->name('property_image.create');
    // Route::post('img_store', [PropertyImgController::class, 'store'])->name('property_image.store');
    // Route::post('img_getData', [PropertyImgController::class, 'getData'])->name('property_image.getData');
    // Route::delete('property_image/{id}', [PropertyImgController::class, 'destroy'])->name('property_image.destroy');
    // Route::get('image-edit/{id}', [PropertyImgController::class, 'imageEdit'])->name('property_image.edit');
    // Route::post('image-update/{id}', [PropertyImgController::class, 'update'])->name('property_image.update');
    // Route::get('image-view/{id}', [PropertyImgController::class, 'show'])->name('property_image.view');

});

Route::get('layout', [LayoutController::class, 'index'])->name('layout');
Route::get('single-property', [SinglePropertyController::class, 'index'])->name('single-property');
Route::get('/single-property/{id}', [SinglePropertyController::class, 'show'])->name('single-property.show');
Route::get('/agent-profile/{id}', [AgentProfileController::class, 'show'])->name('agent-profile');
Route::get('listing', [ListingController::class, 'index'])->name('listing');
// Route::get('/search-properties', [PropertyController::class, 'searchProperties']);
Route::get('/search-properties', [ListingController::class, 'searchProperties'])->name('searchProperties');
Route::get('agent-grid', [AgentGridController::class, 'index'])->name('agent-grid');
Route::get('sale-property', [SalePropertyController::class, 'index'])->name('sale-property');
Route::get('/search-sale-properties', [SalePropertyController::class, 'searchProperties'])->name('saleSearchProperties');

Route::get('rent-property', [RentPropertyController::class, 'index'])->name('rent-property');
Route::get('/search-rent-properties', [RentPropertyController::class, 'searchProperties'])->name('rentSearchProperties');

Route::get('contect', [ContectController::class, 'index'])->name('contect');
Route::get('submit-property', [SubmitPropertyController::class, 'index'])->name('submit-property');
Route::post('submit-property', [SubmitPropertyController::class, 'store'])->name('submit-property.store');
Route::get('login-user', [LoginController::class, 'index'])->name('login-user');
Route::post('login-user', [LoginController::class, 'postLogin'])->name('login-user.post');
Route::get('signup-user', [SignUpController::class, 'index'])->name('signup-user');
Route::post('signup-user', [SignUpController::class, 'store'])->name('user.store');

Route::middleware('auth:web')->group(function () {
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::post('/cart', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/myprofile', [ProfileController::class, 'myProfile'])->name('myprofile');
    Route::post('/myprofile-update', [ProfileController::class, 'update'])->name('update.profile');
    Route::post('logout-user', [ProfileController::class, 'logoutUser'])->name('logout-user');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    // Route::get('/feedback/{property_id}', [FeedbackController::class, 'index']);
});
Route::post('/add-to-wishlist', [WishlistController::class, 'add'])->name('wishlist.add');
Route::get('/wishlist', [WishlistController::class, 'showWishlist'])->name('wishlist.show');
Route::post('/remove-from-wishlist', [WishlistController::class, 'remove'])->name('wishlist.remove');


Route::get('/property/{id}/booking', [BookingController::class, 'show'])->name('booking');
// Route::get('/book/{property_id}', [PaymentController::class, 'showInvoice'])->name('booking.invoice');
Route::post('/pay', [BookingController::class, 'processPayment'])->name('payment.process');
Route::get('/payment/callback', [BookingController::class, 'paymentCallback'])->name('payment.callback');

?>
