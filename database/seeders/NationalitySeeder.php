<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\Nationality;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;

class NationalitySeeder extends Seeder
{
    public function run()
    {
        // Initialize the phone number utility
        $phoneUtil = PhoneNumberUtil::getInstance();

        // Get the list of all country codes
        $countryCodes = $phoneUtil->getSupportedRegions();

        foreach ($countryCodes as $region) {
            try {
                // Get the phone code for each region
                $phoneCode = $phoneUtil->getCountryCodeForRegion($region);

                // You can get the country's name by using the region code
                $countryName = $region;  // You might want to map the region to a full country name

                // Save the country data to the database
                Nationality::updateOrCreate(
                    ['name' => $countryName],
                    [
                        'country_code' => $region,
                        'phone_code' => $phoneCode,
                    ]
                );
            } catch (\libphonenumber\NumberParseException $e) {
                // Handle the exception if needed (e.g., log the error)
                echo "Error with country {$region}: " . $e->getMessage() . "\n";
            }
        }

        echo "Countries and phone codes seeded successfully.";
    }
}
