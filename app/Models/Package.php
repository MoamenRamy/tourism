<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function packagePhotos()
    {
        return $this->hasMany(Package_photo::class, 'package_id');
    }
}
