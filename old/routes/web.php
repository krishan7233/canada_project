<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VisitorVisaController;

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


Route::get('/', [AuthController::class, 'index']);

Route::get('/about-us', [AuthController::class, 'aboutus'])->name('about-us');
Route::get('quote-compare', [AuthController::class, 'quotecompare'])->name('quote-compare');

Route::get('/contact-us', [AuthController::class, 'contactus'])->name('contact-us');

Route::get('/blog', [AuthController::class, 'Blog'])->name('blog');

Route::get('/privacy-policy', [AuthController::class, 'privacypolicy'])->name('privacy-policy');
Route::get('/terms-and-conditions', [AuthController::class, 'termsconditions'])->name('terms-and-conditions');


// Route::get('/quote-compare', [AuthController::class, 'quotecompare'])->name('quote-compare');
Route::get('order/{id}', [AuthController::class, 'Order'])->name('order');
Route::post('order-post', [AuthController::class, 'orderPost'])->name('order-post');
Route::get('/order-confirmation', [AuthController::class, 'OrderConfirmation'])->name('order-confirmation');
Route::get('thank-you', [AuthController::class, 'thankYou'])->name('thank-you');
Route::post('visitor-couple-order-post', [AuthController::class, 'visitorOrderCouplePost'])->name('visitor-couple-order-post');


//Blog Page start
Route::get('/3-effective-ways-to-pay-off-your-student-loan', [AuthController::class, 'EffectiveWays'])->name('3-effective-ways-to-pay-off-your-student-loan');



//Blog Page End

// order
Route::get('couple-order/{id}', [AuthController::class, 'coupleOrder']);
Route::get('couple-plan/{id}', [AuthController::class, 'couplePlan']);
Route::get('visitor-family-order/{id}', [AuthController::class, 'visitorFamilyOrder']);




// super visa post
Route::get('/super-visa', [AuthController::class, 'supervisa'])->name('super-visa');
Route::get('super-visa-post', [AuthController::class, 'supervisaPost'])->name('super-visa-post');


Route::get('/quotes', [AuthController::class, 'quotation'])->name('quotes');
Route::get('single-detect-quotation', [AuthController::class, 'singleDetectQuotation'])->name('single-detect-quotation');
Route::get('/plan', [AuthController::class, 'insuranceplan'])->name('plan');
Route::get('find-quotation', [AuthController::class, 'findQuotation'])->name('find-quotation');
Route::post('deductible_filter', [AuthController::class, 'deductibleFilter'])->name('deductible_filter');


Route::post('super-visa-deductible-couple', [AuthController::class, 'superVisaDeductibleCouple'])->name('super-visa-deductible-couple');
Route::get('super-visa-deductable-quotation', [AuthController::class, 'superVisaDeductibleQuotation'])->name('super-visa-deductable-quotation');
// visitor visa insurance
Route::get('visitor-visa-insurance', [AuthController::class, 'visitorVisa'])->name('visitor-visa-insurance');
Route::post('visitor-single-coverage-get-quotation', [AuthController::class, 'visitorSingleCoverageGetQuotation'])->name('visitor-single-coverage-get-quotationt');
Route::post('visitor-single-coverage-deductatble-get-quotation', [AuthController::class, 'visitorSingleCoverageDeductableGetQuotation'])->name('visitor-single-coverage-deductatble-get-quotation');
Route::get('visitor-single-deductable-quotation', [AuthController::class, 'visitorSingleDeductableQuotation'])->name('visitor-single-deductable-quotation');
// visitor couple
Route::post('visitor-couple-coverage-get-quotation', [AuthController::class, 'visitorCoupleCoverageGetQuotation'])->name('visitor-couple-coverage-get-quotationt');
Route::post('visitor-visa-deductible-couple', [AuthController::class, 'visitorVisaDeductibleCouple'])->name('visitor-visa-deductible-couple');
Route::get('visitor-visa-deductable-quotation', [AuthController::class, 'visitorVisaDeductibleQuotation'])->name('visitor-visa-deductable-quotation');

// visitor family
Route::post('visitor-family-coverage-get-quotation', [AuthController::class, 'visitorFamilyCoverageGetQuotation'])->name('visitor-family-coverage-get-quotation');
Route::post('visitor-family-deductible', [AuthController::class, 'visitorFamilyDeductible'])->name('visitor-family-deductible');
Route::get('visitor-family-deductable-quotation', [AuthController::class, 'visitorFamilyDeductibleQuotation'])->name('visitor-family-deductable-quotation');

/**************************new url visitor visa canada*******************************/ 
Route::get('visitor-visa-single-quotation', [VisitorVisaController::class, 'visitorVisaSingleQuotation']);
Route::get('visitor-couple-coverage-quotation', [VisitorVisaController::class, 'visitorCoupleCoverageQuotation']);
Route::get('visitor-family-coverage-quotation', [VisitorVisaController::class, 'visitorFamilyCoverageQuotation']);



// compare quotation
Route::post('compare-post', [AuthController::class, 'comparePost'])->name('compare-post');
Route::get('compare-quote', [AuthController::class, 'compareQuote'])->name('compare-quote');

Route::post('super-visa-couple-compare-post', [AuthController::class, 'superVisaCoupleComparePost'])->name('super-visa-couple-compare-post');
Route::get('super-visa-couple-compare', [AuthController::class, 'superVisaCoupleCompare'])->name('super-visa-couple-compare');
// visitor
Route::post('visitor-single-compare-post', [AuthController::class, 'visitorSingleComparePost'])->name('visitor-single-compare-post');
Route::get('visitor-single-compare', [AuthController::class, 'visitorSingleCompare'])->name('visitor-single-compare');
Route::post('visitor-couple-compare-post', [AuthController::class, 'visitorCoupleComparePost'])->name('visitor-couple-compare-post');
Route::get('visitor-couple-compare', [AuthController::class, 'visitorCoupleCompare'])->name('visitor-couple-compare');
Route::post('visitor-family-compare-post', [AuthController::class, 'visitorFamilyComparePost'])->name('visitor-family-compare-post');
Route::get('visitor-family-compare', [AuthController::class, 'visitorFamilyCompare'])->name('visitor-family-compare');

// plan

Route::get('single-plan/{id}', [AuthController::class, 'singlePlan'])->name('single-plan');
Route::post('single-plan-post', [AuthController::class, 'singlePlanPost'])->name('single-plan-post');
Route::post('couple-plan-post', [AuthController::class, 'couplePlanPost'])->name('couple-plan-post');
Route::post('email-and-whatsapp-post', [AuthController::class, 'emailAndWhatsappPost'])->name('email-and-whatsapp-post');
// visitor
Route::get('visitor-single-plan/{id}', [AuthController::class, 'visitorSinglePlan'])->name('visitor-single-plan');
Route::get('visitor-couple-plan/{id}', [AuthController::class, 'visitorCouplePlan'])->name('visitor-couple-plan');
Route::get('visitor-family-plan/{id}', [AuthController::class, 'visitorFamilyPlan'])->name('visitor-family-plan');


// admin dashboard
Route::get('admin-login', [AdminLoginController::class, 'admin_login'])->name('admin-login');
Route::post('admin-login-post', [AdminLoginController::class, 'adminLoginPost'])->name('admin-login-post');
// dashboard
Route::get('admin-dashboard', [DashboardController::class, 'dashboard'])->name('admin-dashboard');
Route::get('admin-registration-list', [DashboardController::class, 'registrationList'])->name('admin-registration-list');
Route::post('admin-registration-update-status', [DashboardController::class, 'registrationUpdateStatus'])->name('admin-registration-update-status');
Route::get('admin-detectible-list/{id}', [DashboardController::class, 'amountDetectibleList'])->name('admin-detectible-list');
Route::get('admin-add-rate', [DashboardController::class, 'addRate'])->name('admin-add-rate');
Route::post('admin-rate-price-post', [DashboardController::class, 'ratePricePost'])->name('admin-rate-price-post');
Route::post('admin-get-detectible', [DashboardController::class, 'getDetictible'])->name('admin-get-detectible');
Route::post('admmin-add-rate-post', [DashboardController::class, 'addRatePost'])->name('admmin-add-rate-post');
Route::get('admmin-edit-rate/{id}', [DashboardController::class, 'editRate'])->name('admmin-edit-rate');
Route::get('admmin-view-rate/{id}', [DashboardController::class, 'viewRate'])->name('admmin-view-rate');
Route::get('admin-rate-price-get', [DashboardController::class, 'ratePriceGet'])->name('admin-rate-price-get');
