<?php

use App\Comment;
use App\User;
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
        $comment->post_id = 1;
        $comment->user_id = 1;
        $user = User::findOrFail(1);
        $comment->user = $user->username;
        $comment->body = 'im just a teenage dirt bag baby';
        $comment->likes = rand(1,1000);
        $comment->save();

        factory(App\Comment::class, 100)->create();
    }
}
