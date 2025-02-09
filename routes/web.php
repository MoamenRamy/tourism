<?php

use App\Http\Controllers\AdditionalServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommonQuestionController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\IncludeServiceController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\SafetyController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TourDetailsController;
use App\Http\Controllers\TourPhotoController;
use App\Http\Controllers\TransportationAdditionalController;
use App\Http\Controllers\TransportationCommonController;
use App\Http\Controllers\TransportationController;
use App\Http\Controllers\TransportationIncludeController;
use App\Http\Controllers\TransportationSaleController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('additional-services', AdditionalServiceController::class);

Route::resource('categories', CategoryController::class)->parameters([
    'categories' => 'category:slug'
]);

Route::resource('common-questions', CommonQuestionController::class);

Route::resource('currencies', CurrencyController::class)->parameters([
    'currencies' => 'currency:slug'
]);

Route::resource('destinations', DestinationController::class)->parameters([
    'destinations' => 'destination:slug'
]);

Route::resource('include-services', IncludeServiceController::class);

Route::get('nationalities', [NationalityController::class, 'index']);

Route::resource('rates', RateController::class);

Route::resource('safeties', SafetyController::class);

Route::resource('sales', SaleController::class);

Route::resource('tours', TourController::class);

// Route::resource('tour-details', TourDetailsController::class);
Route::get('/tour-details', [TourDetailsController::class, 'index']);
Route::get('/test', [TestController::class, 'test']);


Route::resource('tour-photos', TourPhotoController::class);

Route::resource('transportation_additional', TransportationAdditionalController::class);

Route::resource('transportations', TransportationController::class);

Route::resource('transportation_questions', TransportationCommonController::class);

Route::resource('transportation_include', TransportationIncludeController::class);

Route::resource('transportation_sales', TransportationSaleController::class);

Route::resource('vehicles', VehicleController::class);
