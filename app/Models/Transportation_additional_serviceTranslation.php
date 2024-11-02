<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportation_additional_serviceTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'transportation_additional_translations'; // Explicitly define the table name
    protected $guarded = ['id'];
}
