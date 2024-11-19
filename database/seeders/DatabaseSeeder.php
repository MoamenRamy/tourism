<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CurrencySeeder::class);
        $this->call(Currency_translationSeeder ::class);
        $this->call(NationalitySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DestinationSeeder::class);
        $this->call(Destination_translationSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(Category_translationSeeder::class);
        $this->call(TourSeeder::class);
        $this->call(Tour_translationSeeder::class);
        $this->call(Tour_reservationSeeder::class);
        $this->call(Tour_photoSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(Package_translationSeeder::class);
        $this->call(Package_photoSeeder::class);
        $this->call(Package_serviceSeeder::class);
        $this->call(Additional_serviceSeeder::class);
        $this->call(Additional_service_translationsSeeder::class);
        $this->call(Additional_service_tourSeeder::class);
        $this->call(Additional_service_reservationSeeder::class);
        $this->call(Common_questionSeeder::class);
        $this->call(Common_question_translationSeeder::class);
        $this->call(Common_question_tourSeeder::class);
        $this->call(RateSeeder::class);
        $this->call(Rate_translationSeeder::class);
        $this->call(SaleSeeder::class);
        $this->call(Include_serviceSeeder::class);
        $this->call(Include_service_translationSeeder::class);
        $this->call(Include_service_tourSeeder::class);
        $this->call(SafetySeeder::class);
        $this->call(Safety_translationSeeder::class);
        $this->call(Safety_tourSeeder::class);
        $this->call(VehicleSeeder::class);
        $this->call(Vehicle_translationSeeder::class);
        $this->call(TransportationSeeder::class);
        $this->call(Transportation_translationSeeder::class);
        $this->call(Transportation_reservationSeeder::class);
        // $this->call(Transportation_reservation_translationSeeder::class);
        // $this->call(Tour_reservation_translationSeeder::class);
        $this->call(Transportation_saleSeeder::class);
        $this->call(Transportation_additional_serviceSeeder::class);
        $this->call(Transportation_additional_service_translationSeeder::class);
        $this->call(Transportation_additional_service_reservationSeeder::class);
        $this->call(Transportation_common_questionSeeder::class);
        $this->call(Transportation_common_question_translationSeeder::class);
        $this->call(Transportation_includeSeeder::class);
        $this->call(Transportation_include_translationSeeder::class);
        $this->call(NotificationSeeder::class);
        $this->call(Notification_translationSeeder::class);
        $this->call(AlertSeeder::class);
        $this->call(Tour_detailSeeder::class);
        $this->call(Tour_detail_translationSeeder::class);
        $this->call(TourSectionSeeder::class);
        $this->call(TourSectionTranslationSeeder::class);
        $this->call(PackageReservationSeeder::class);
    }
}
