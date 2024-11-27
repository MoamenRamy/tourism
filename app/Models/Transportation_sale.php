<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportation_sale extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // belong to destination
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
