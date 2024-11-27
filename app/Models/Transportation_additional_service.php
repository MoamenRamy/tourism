<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Transportation_additional_service extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['name', 'description'];
    protected $guarded = ['id'];

    protected $table = 'transportation_additionals'; // Explicitly define the table name

    // has many transportation reservations
    public function Transportation_reservations()
    {
        return $this->hasMany(Transportation_reservation::class, 'transportation_additional_service_reservaiton');
    }
}
