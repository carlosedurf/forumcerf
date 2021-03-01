<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    Thread,
    User
};

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create()->each(function ($user){

            $thread = Thread::factory(3)->make();

            $user->threads()->saveMany($thread);

        });
    }
}
