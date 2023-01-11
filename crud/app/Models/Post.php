<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Post extends Model
{
    use HasFactory;
    protected $guarded = [];



    // relation
    public function category(){
        return $this->hasOne(Category::class,'id');
    }

    // accessor and mutators
    protected function slug(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Str::slug($value),
            set: fn($value) => Str::slug($value),
        );
    }

}
