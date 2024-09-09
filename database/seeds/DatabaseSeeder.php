<?php
use App\User;
use Illuminate\Database\Seeder;
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
        factory(User::class , 5)->create();
        
        $this->call(BookSeeder::class);
        factory(Books::class , 5)->create();

        // $this->call(UserSeeder::class);
        factory(User::class,5)->create();
    }
}
