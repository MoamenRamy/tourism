<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Tour extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['name', 'defination', 'description'];
    protected $guarded = ['id'];

    // relation with destination
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    // relation with category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // relation with tour sections
    public function sections()
    {
        return $this->hasMany(TourSection::class);
    }

    // relation with tour additional service tours
    public function additionalServiceTours()
    {
        return $this->belongsToMany(Additional_service::class, 'additional_service_tours', 'tour_id', 'additional_id');
    }

    // relation with tour details
    public function details()
    {
        return $this->hasMany(Tour_detail::class);
    }

    // relation with tour photos
    public function photos()
    {
        return $this->hasMany(Tour_photo::class);
    }

    // relation with tour reservations
    public function reservations()
    {
        return $this->hasMany(Tour_reservation::class);
    }

    // relation with common questions
    public function commonQuestions()
    {
        return $this->hasMany(Common_question::class);
    }

    // relation with rate
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    // relation with safety tours
    public function safety()
    {
        return $this->hasMany(Safety::class);
    }

    // relation with sales
    public function sales()
    {
        return $this->hasOne(Sale::class);
    }

    // tour has many packages
    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_services');
    }

    public function include_services()
    {
        return $this->hasMany(Include_service::class)->where('include', 1);
    }

    public function not_include_services()
    {
        return $this->hasMany(Include_service::class)->where('include', 0);
    }
}
