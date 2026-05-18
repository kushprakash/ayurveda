<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\ApplicationProcessController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/consultation', function () {
    return view('consultation');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/location', function () {
    return view('location');
});

Route::get('/login', function () {
    return redirect()->route('career')->with('error', 'Please register or login first.');
})->name('login');


Route::get('/career', [RecruitmentController::class, 'career'])->name('career');
Route::get('/vacancies/get', [RecruitmentController::class, 'getVacancies'])->name('vacancies.get');
Route::get('/vacancy/{id}', [RecruitmentController::class, 'vacancyDetails'])->name('vacancy.details');
Route::get('/districts/{state_id}', [RecruitmentController::class, 'getDistricts'])->name('districts.get');
Route::get('/blocks/{district_id}', [ApplicationProcessController::class, 'getBlocks'])->name('blocks.get');
Route::get('/panchayats/{block_id}', [ApplicationProcessController::class, 'getPanchayats'])->name('panchayats.get');
Route::get('/villages/{panchayat_id}', [ApplicationProcessController::class, 'getVillages'])->name('villages.get');


// Application Flow
Route::post('/register-applicant', [ApplicationProcessController::class, 'register'])->name('applicant.register');
Route::post('/verify-otp', [ApplicationProcessController::class, 'verifyOtp'])->name('otp.verify');

Route::middleware(['auth'])->group(function () {
    Route::get('/apply/{vacancy_id}', [ApplicationProcessController::class, 'showForm'])->name('apply.form');
    Route::post('/apply/submit', [ApplicationProcessController::class, 'submitStep'])->name('apply.submit');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Payment Flow
    Route::post('/apply/payment/initiate', [PaymentController::class, 'initiate'])->name('apply.payment.initiate');
    Route::post('/apply/payment/check-status', [PaymentController::class, 'checkStatus'])->name('apply.payment.check_status');
    Route::get('/apply/payment/gateway', [PaymentController::class, 'gateway'])->name('payment.gateway');
    Route::post('/apply/payment/process', [PaymentController::class, 'processMock'])->name('apply.payment.process');
    Route::get('/apply/receipt/{application_id}', [PaymentController::class, 'receipt'])->name('apply.receipt');

    Route::post('/apply/auto-save', [ApplicationProcessController::class, 'autoSave'])->name('apply.auto_save');

    Route::post('/apply/upload-document', [ApplicationProcessController::class, 'uploadDocument'])->name('apply.upload_document');


    // Admin Routes (Simple check for now)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/vacancies', [\App\Http\Controllers\Admin\AdminController::class, 'vacancies'])->name('vacancies');
        Route::get('/applications', [\App\Http\Controllers\Admin\AdminController::class, 'applications'])->name('applications');
    });
});



Route::get('/booking', function () {
    return view('booking');
});

Route::get('/privacy', function () {
    return view('privacy');
});
