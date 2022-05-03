<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function image() {
        return $this->hasOne(Images::class);
    }

    public function all_images() {
        return $this->hasMany(Images::class);
    }

    public function like() {
        return $this->hasOne(Like::class);
    }
}
