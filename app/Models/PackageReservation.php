<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageReservation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // has one package
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    // has one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // has one currency
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
