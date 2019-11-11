<?php
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "kyle broflowskii";
        $user->email = "kylebroflowskii@gmail.com";
        $user->password = "kkkyle123";
        $user->username = "xXKdog69Xx";
        $user->favourite_genre = "spooky";
        $user->title = "professional writer";
        $user->save();

        factory(App\User::class, 50)->create();
    }
}
