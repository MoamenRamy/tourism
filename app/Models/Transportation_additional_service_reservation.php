<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportation_additional_service_reservation extends Model
{
    use HasFactory;

    protected $table = 'transportation_additional_reservations'; // Explicitly define the table name
    protected $guarded = ['id'];

    // belongs to trasportation reservations
    public function transportationReservation()
    {
        return $this->belongsTo(Transportation_reservation::class);
    }

    // belong to trasportation additional services
    public function transportationAdditionalService()
    {
        return $this->belongsTo(Transportation_additional_service::class);
    }
}
