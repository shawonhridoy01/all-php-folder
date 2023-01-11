<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=10;$i++){
            $posts = new Post();
            $posts->title = Str::title('title');
            $posts->sub_title = Str::title('sub_title');
            $posts->description = "This is my description" . $i;
            $posts->thumbnail = 'image'.$i.'jpg';
            $posts->slug = Str::slug('title');
            $posts->category_name = $i;
            $posts->author = 'shawon'.$i;
        }
    }
}
