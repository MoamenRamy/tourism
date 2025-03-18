<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Transportation_reservation extends Model
{
    use HasFactory;

    // public $translatedAttributes = ['title', 'content'];
    protected $guarded = ['id'];

    // has many transportation additional services
    public function transportation_additional_service_reservations()
    {
        return $this->hasMany(Transportation_additional_service_reservation::class);
    }

    public function transportation_additional_services()
    {
        return $this->belongsToMany(Transportation_additional_service::class, 'transportation_additional_service_reservation');
    }

    public function transportation()
    {
        return $this->belongsTo(Transportation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
