<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('lt_LT');

        foreach(range(1, 20) as $_){
            DB::table('shops')->insert([
                'name'=>  $faker->firstName . ' shop',
                'city'=> $faker->city,
                'adress'=> $faker->streetAddress,
                'starts'=> rand(8,12). ':00:00',
                'ends'=>rand(12, 22) .':00:00',
            ]);
        }
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123'),
            'role'=> 10,
        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('123'),
        ]);
    }
}
