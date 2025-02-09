<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Additional_service extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['name', 'description'];
    protected $guarded = ['id'];

    // Define the relationship for translations (optional, depending on your setup)

    // public function translations()
    // {
    //     return $this->hasMany(Additional_serviceTranslation::class);
    // }
}
