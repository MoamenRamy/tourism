<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Transportation extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['from', 'to'];
    protected $guarded = ['id'];

    // belong to destination
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    // belong to vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    // has many reservations
    public function reservations()
    {
        return $this->hasMany(Transportation_reservation::class);
    }

    // has many transportation additionals
    public function transport_additional_services()
    {
        return $this->hasMany(Transportation_additional_service::class);
    }

}
