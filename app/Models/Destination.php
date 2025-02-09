<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Destination extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['description'];
    protected $guarded = ['id'];

    // has one transportations sales
    public function transportationSale()
    {
        return $this->hasOne(Transportation_sale::class);
    }

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
}
