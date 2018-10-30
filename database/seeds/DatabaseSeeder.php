<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(\App\User::class, 10)->create();
        factory(\App\Forum::class, 30)->create();
        factory(\App\Post::class, 50)->create();
        factory(\App\Reply::class, 100)->create();
    }
}
