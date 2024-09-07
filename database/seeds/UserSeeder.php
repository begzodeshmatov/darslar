<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
<<<<<<< HEAD

=======
>>>>>>> 13b876931e1215ffafd7ce3b72861de36dd72960
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
<<<<<<< HEAD
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
=======
            'name' => 'Sahobiddin',
            'email' => 'sahob8560544@gmail.com',
            'password' => Hash::make('sahob2007'),
>>>>>>> 13b876931e1215ffafd7ce3b72861de36dd72960
        ]);
    }
}
