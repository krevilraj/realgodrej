<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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
        'name' => "Rajkumar", //
        'email' => "krevilraj@gmail.com",
        'password' => Hash::make('password'),
        'address' => "Imadol",
        'isadmin' => 1,
        'phone' =>"123123"
      ]);


    }
}
