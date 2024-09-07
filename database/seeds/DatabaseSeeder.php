<?php
use App\User;
use Illuminate\Database\Seeder;
use App\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        // $this->call(UserSeeder::class);
        factory(User::class,100)->create();
=======
        $this->call(UserSeeder::class);
        $this->call(BookSeeder::class);
        factory(User::class , 50)->create();
>>>>>>> 13b876931e1215ffafd7ce3b72861de36dd72960
    }
}
