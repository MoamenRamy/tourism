<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    public function currencyTranslations()
    {
        return $this->hasMany(Currency_translation::class, 'currency_id');
    }
}
