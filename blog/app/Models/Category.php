<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "slug",
        "description",
        "image",
        "meta_title",
        "meta_description",
        "meta_keyword",
        "navbar_status",
        "status",
        "created_by"
    ];

    public function posts(){
        return $this->hasMany(Post::class,'category_id','id');
    }

    public function delete()
    {
        // delete all related photos
        $this->posts()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }


}
