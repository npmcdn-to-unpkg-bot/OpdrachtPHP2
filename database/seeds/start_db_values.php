<?php

use Illuminate\Database\Seeder;

class start_db_values extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create admin user
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'zipcode' => '2275',
            'city' => 'Poederlee'
        ]);


        // insert a few categories

        DB::table('categories')->insert([
            'name' => 'SportArtikelen'
        ]);
        DB::table('categories')->insert([
            'name' => 'Elektronica'
        ]);
        DB::table('categories')->insert([
            'name' => 'Kleding'
        ]);
        DB::table('categories')->insert([
            'name' => 'Voertuigen'
        ]);
        DB::table('categories')->insert([
            'name' => 'Meubelen'
        ]);


    }
}
