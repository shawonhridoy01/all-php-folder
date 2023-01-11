<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function post(){
        return $this->belongsToMany(Post::class);
    }



    public function Name(): Attribute
    {
        return Attribute::make(
            set: fn($value) => ucfirst($value),
            get: fn($value) => ucfirst($value),
        );
    }

}
