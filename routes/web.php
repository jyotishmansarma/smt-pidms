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
    return view('welcome');
});

Route::get('register', [\App\Http\Controllers\RegisterController::class, 'create'])->name('register');
Route::post('register', [\App\Http\Controllers\RegisterController::class, 'store'])->name('register');

//Route::get('purchase/', [\App\Http\Controllers\PurchaseOrderController::class, 'index'])->name('purchase.index');
//Route::get('purchase/create', [\App\Http\Controllers\PurchaseOrderController::class, 'create'])->name('purchase.create');
//Route::post('purchase/store', [\App\Http\Controllers\PurchaseOrderController::class, 'store'])->name('purchase.store');
//Route::get('purchase/{purchaseOrder}', [\App\Http\Controllers\PurchaseOrderController::class, 'show'])->name('purchase.show');


Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
});
Route::group(['middleware' => 'auth'], function () {

    Route::get('purchase/', [\App\Http\Controllers\PurchaseOrderController::class, 'index'])->name('purchase.index');
    Route::get('purchase-rejected', [\App\Http\Controllers\PurchaseOrderController::class, 'rejectedlist'])->name('purchase.rejected');
    Route::get('purchase/create', [\App\Http\Controllers\PurchaseOrderController::class, 'create'])->name('purchase.create');
    Route::post('purchase/store', [\App\Http\Controllers\PurchaseOrderController::class, 'store'])->name('purchase.store');
    Route::get('purchase/{purchaseOrder}', [\App\Http\Controllers\PurchaseOrderController::class, 'show'])->name('purchase.show');
    Route::get('purchase/edit/{purchaseOrder}', [\App\Http\Controllers\PurchaseOrderController::class, 'edit'])->name('purchase.edit');
    
    Route::post('purchase/update', [\App\Http\Controllers\PurchaseOrderController::class, 'update'])->name('purchase.update');
    Route::get('purchaseorder/init', [\App\Http\Controllers\PurchaseOrderController::class, 'init'])->name('purchase.init');

    Route::resource('users', \App\Http\Controllers\UserCreateController::class);
    Route::get('purchaseorder/create', [\App\Http\Controllers\DealerController::class, 'create'])->name('dealer.create');





    // Route::get('/get-issue-types', [ \App\Http\Controllers\IssueTrackingController::class, 'getIssueTypes'])->name('get_issue_types');
    // Route::get('/get-issue-data/{id}', [ \App\Http\Controllers\IssueTrackingController::class, 'getIssueData'])->name('get_issue_data');
    // Route::get('/issue-approved/{id}', [ \App\Http\Controllers\IssueTrackingController::class, 'approvedIssue'])->name('issue_approved');
    // Route::get('/issue-delete/{id}', [ \App\Http\Controllers\IssueTrackingController::class, 'delete'])->name('issue_delete');
    // Route::get('/track-application/{id}', [ \App\Http\Controllers\IssueTrackingController::class, 'track_application'])->name('track_application');
    // Route::get('/get-search-issue-details/{id}', [ \App\Http\Controllers\IssueTrackingController::class, 'search_issue_details'])->name('get_search_issue_details');
    // Route::post('/issue_update', [ \App\Http\Controllers\IssueTrackingController::class, 'issue_update'])->name('issue_update');
    // Route::get('/issue_update/{id}', [ \App\Http\Controllers\IssueTrackingController::class, 'delete'])->name('delete');
    
    
    Route::get('/my-profile/{id}', [ \App\Http\Controllers\UserCreateController::class, 'get_myprofile'])->name('get_myprofile');
    Route::post('/update-my-profile/{id}', [ \App\Http\Controllers\UserCreateController::class, 'update_myprofile'])->name('update_myprofile');
    Route::get('/password-change/{id}', [ \App\Http\Controllers\UserCreateController::class, 'change_password'])->name('change_password');
    Route::post('/update-password/{id}', [ \App\Http\Controllers\UserCreateController::class, 'update_password'])->name('update_password');

    


});

