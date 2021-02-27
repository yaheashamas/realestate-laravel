<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->insert([
//            'name' => $this->faker->name,
//            'email' => $faker->unique()->safeEmail,
//            'email_verified_at' => now(),
//            'phone_number' => $faker->numberBetween(10000000000,20000000000),
//            'avatar' => $faker->imageUrl(),
//            'x_latitude'=>$faker->randomFloat(10,10),
//            'y_longitude'=>$faker->randomFloat(10,10),
//            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//            'api_token' => bin2hex(openssl_random_pseudo_bytes(30)),
//            'remember_token' => Str::random(10),
//        ]);
    }
}
