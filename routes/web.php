<?php

use App\Http\Controllers\AdditionalServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommonQuestionController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncludeServiceController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\SafetyController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TourDetailsController;
use App\Http\Controllers\TourPhotoController;
use App\Http\Controllers\TourReservationController;
use App\Http\Controllers\TransportationAdditionalController;
use App\Http\Controllers\TransportationCommonController;
use App\Http\Controllers\TransportationController;
use App\Http\Controllers\TransportationIncludeController;
use App\Http\Controllers\TransportationReservationController;
use App\Http\Controllers\TransportationSaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Models\Rate;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\MockObject\Rule\Parameters;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('services', [HomeController::class, 'services'])->name('services');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::resource('additional-services', AdditionalServiceController::class);
Route::get('admin/additional-services', [AdditionalServiceController::class, 'adminIndex'])->name('admin.additional-services.index');

Route::resource('categories', CategoryController::class)->parameters([
    'categories' => 'category:slug'
]);
Route::get('admin/categories', [CategoryController::class, 'adminIndex'])->name('admin.categories.index');


Route::resource('common-questions', CommonQuestionController::class);
Route::get('admin/common-questions', [CommonQuestionController::class, 'adminIndex'])->name('admin.common-questions.index');

Route::resource('currencies', CurrencyController::class)->parameters([
    'currencies' => 'currency:slug'
]);
Route::get('admin/currencies', [CurrencyController::class, 'adminIndex'])->name('admin.currencies.index');

Route::resource('destinations', DestinationController::class)->parameters([
    'destinations' => 'destination:slug'
]);
Route::get('destination/{slug}/tours', [TourController::class, 'get_tours_by_destination'])
->name('tours.getByDestination');
Route::get('admin/destination', [DestinationController::class, 'adminIndex'])->name('admin.destination.index');

Route::resource('include-services', IncludeServiceController::class);
Route::get('admin/include-services', [IncludeServiceController::class, 'adminIndex'])->name('admin.include-services.index');


Route::get('nationalities', [NationalityController::class, 'index']);

Route::resource('rates', RateController::class);
Route::get('admin/rates', [RateController::class, 'adminIndex'])->name('admin.rates.index');

Route::resource('safeties', SafetyController::class);
Route::get('admin/safeties', [SafetyController::class, 'adminIndex'])->name('admin.safeties.index');

Route::resource('sales', SaleController::class);
Route::get('admin/sales', [SaleController::class, 'adminIndex'])->name('admin.sales.index');

// Route::get('/tours/detail-input', [TourController::class, 'getTourDetailInput'])->name('tour-details.create');
Route::get('/tour-detail-input', [TourController::class, 'getTourDetailInput'])->name('tour-details.create');

Route::resource('tours', TourController::class)->parameters([
    'tours' => 'tour:slug'
]);
Route::get('admin/tours', [TourController::class, 'adminIndex'])->name('admin.tours.index');

// Route::resource('tour-details', TourDetailsController::class);
Route::get('/tour-details', [TourDetailsController::class, 'index']);
Route::delete('/tour-details/{id}', [TourDetailsController::class, 'destroy'])->name('tour-details.destroy');


// Route::get('/test', [TestController::class, 'test']);

Route::resource('tour-photos', TourPhotoController::class);

Route::resource('tour-reservations', TourReservationController::class);
Route::get('admin/tour-reservations', [TourReservationController::class, 'adminIndex'])->name('admin.tour-reservations.index');
Route::get('tour-reservations/booking/{slug}', [TourReservationController::class, 'createBooking'])->name('tour-reservations.createBooking');
Route::post('tour-reservations/booking/{slug}', [TourReservationController::class, 'booking'])->name('tour-reservations.booking');

Route::resource('transportation_additional', TransportationAdditionalController::class);
Route::get('admin/transportation_additional', [TransportationAdditionalController::class, 'adminIndex'])->name('admin.transportation_additional.index');

Route::resource('transportations', TransportationController::class);
Route::get('admin/transportations', [TransportationController::class, 'adminIndex'])->name('admin.transportations.index');

Route::resource('transportation_questions', TransportationCommonController::class);
Route::get('admin/transportation_questions', [TransportationCommonController::class, 'adminIndex'])->name('admin.transportation_questions.index');

Route::resource('transportation_include', TransportationIncludeController::class);

Route::resource('transportation_sales', TransportationSaleController::class);
Route::get('admin/transportation_sales', [TransportationSaleController::class, 'adminIndex'])->name('admin.transportation_sales.index');

Route::resource('vehicles', VehicleController::class);
Route::get('admin/vehicles', [VehicleController::class, 'adminIndex'])->name('admin.vehicles.index');

Route::resource('transportation_reservations', TransportationReservationController::class);
Route::get('admin/transportation_reservations', [TransportationReservationController::class, 'adminIndex'])->name('admin.transportation_reservations.index');
Route::get('/get-destinations', [TransportationController::class, 'getDestinations'])->name('transportation.getDestinations');


Route::resource('users', UserController::class);
Route::get('admin/users', [UserController::class, 'adminIndex'])->name('admin.users.index');
