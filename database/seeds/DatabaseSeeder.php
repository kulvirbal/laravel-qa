<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 3)->create()->each(function($user) {
            $user->questions()
            ->saveMany(
                factory(App\Question::class, 5)->make()
            )
            ->each(function($q) {
                $q->answers()->saveMany(
                    factory(App\Answer::class, rand(3, 7))->make()
                );
            });
        });
    }
}
