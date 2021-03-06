<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    public function image() {
        return $this->hasOne(Images::class)->orderBy("sorting");
    }

    public function all_images() {
        return $this->hasMany(Images::class)->orderBy("sorting");
    }

    public function like() {
        return $this->hasOne(Like::class)->where("user_id", Auth::id());
    }
}
