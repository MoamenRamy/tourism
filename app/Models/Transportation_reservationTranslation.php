<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportation_reservationTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];
}
