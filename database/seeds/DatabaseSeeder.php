<?php
use App\User;
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
        // $this->call(UserSeeder::class);
        factory(User::class,100)->create();
        $this->call(UserSeeder::class);
        $this->call(BookSeeder::class);
        factory(User::class , 50)->create();
    }
}
