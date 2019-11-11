<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post;
        $post->user_id = rand(1,50);
        $post->body = "according to all know laws of aviation, a bee should not be capable of flight";
        $post->save();
        factory(App\Post::class, 50)->create();
    }
}
