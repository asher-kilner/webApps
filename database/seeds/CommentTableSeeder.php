<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = new Comment;
        $comment->post_id = rand(1,50);
        $comment->user_id = rand(1,50);
        $comment->title = 'my fav song';
        $comment->body = 'im just a teenage dirt bag baby';
        $comment->likes = rand(1,1000);
        $comment->save();

        factory(App\Comment::class, 100)->create();
    }
}
