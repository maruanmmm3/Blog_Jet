<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Todo esto es para generar una imagen por cada Post
        
        $posts = Post::factory(100)->create();

        foreach ($posts as $post) {
            Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class
            ]);
            //RELACION MUCHOS A MUCHOS-Esto es por la tabla central
            $post->tags()->attach([
                rand(1, 4),
                rand(5, 8)
            ]);
        }
    }
}
