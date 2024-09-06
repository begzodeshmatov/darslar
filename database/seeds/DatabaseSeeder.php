<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Books;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        factory(User::class , 50)->create();
        
        $this->call(BookSeeder::class);
        factory(Books::class , 500)->create();
    }
}
