<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour_reservation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relation with tour
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    // relation with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relation with currency
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    // relation with additional service reservations
    public function additionalServiceReservations()
    {
        return $this->hasMany(Additional_service_reservation::class);
    }
}
