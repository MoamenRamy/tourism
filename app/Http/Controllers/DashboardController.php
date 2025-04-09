<?php

namespace App\Http\Controllers;

use App\Models\Additional_service;
use App\Models\Category;
use App\Models\Common_question;
use App\Models\Currency;
use App\Models\Destination;
use App\Models\Rate;
use App\Models\Safety;
use App\Models\Sale;
use App\Models\Tour;
use App\Models\Tour_reservation;
use App\Models\Transportation;
use App\Models\Transportation_additional_service;
use App\Models\Transportation_common_question;
use App\Models\Transportation_reservation;
use App\Models\Transportation_sale;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $destination = Destination::count();
        $category = Category::count();
        $tour = Tour::count();
        $additionService = Additional_service::count();
        $commonQuestion = Common_question::count();
        $safety = Safety::count();
        $rate = Rate::count();
        $tourReservation = Tour_reservation::count();
        $sale = Sale::count();

        $vehicle = Vehicle::count();
        $transportation = Transportation::count();
        $transportationAdditional = Transportation_additional_service::count();
        $transportationCommon = Transportation_common_question::count();
        $transportationReservation = Transportation_reservation::count();
        $transportationSale = Transportation_sale::count();

        $currency = Currency::count();
        $user = User::count();

        return view('admin.index', compact(
            'destination',
            'category',
            'tour',
            'additionService',
            'commonQuestion',
            'safety',
            'rate',
            'tourReservation',
            'sale',
            'vehicle',
            'transportation',
            'transportationAdditional',
            'transportationCommon',
            'transportationReservation',
            'transportationSale',
            'currency',
            'user',
        ));
    }
}
