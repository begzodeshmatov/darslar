<?php

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'name' => 'Sahobiddin',
            'surname' => 'Eshquvatov',
            'email' => 'sahob8560544@gmail.com',
            'book_name' => 'Ikki eshik orasi',
            'tel_raqam' => '938560544',
        ]);
    }
}
