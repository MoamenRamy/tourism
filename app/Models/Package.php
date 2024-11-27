<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Package extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['name', 'description'];
    protected $guarded = ['id'];

    public function packagePhotos()
    {
        return $this->hasMany(Package_photo::class, 'package_id');
    }

    // packages has many tours
    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'package_services');
    }

    // has many package reservations
    public function packageReservations()
    {
        return $this->hasMany(PackageReservation::class);
    }
}
