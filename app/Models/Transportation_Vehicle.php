<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transportation_Vehicle extends Model
{
    public $timestamps = false;

    protected $table = 'transportation_vehicle'; // <- explicit table name (recommended)
    protected $fillable = ['transportation_id', 'vehicle_id', 'price'];
}
