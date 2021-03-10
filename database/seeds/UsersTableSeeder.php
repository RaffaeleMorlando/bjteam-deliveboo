<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 5; $i++) {
        $newUser = new User();
        $newUser->name = $faker->name;
        $newUser->password = Hash::make('password');
        $newUser->address = $faker->address;
        $newUser->email = $faker->email;
        $newUser->role = "seller";
        $newUser->save();

      }
        // DB::table('users')->truncate(); //for cleaning earlier data to avoid duplicate entries
        // DB::table('users')->insert([
        //   'name' => 'the admin user',
        //   'email' => 'iamadmin@gmail.com',
        //   'role' => 'admin',
        //   'password' => Hash::make('password'),
        // ]);
        // DB::table('users')->insert([
        //   'name' => 'the seller user',
        //   'email' => 'iamaseller@gmail.com',
        //   'role' => 'seller',
        //   'password' => Hash::make('password'),
        // ]);
    }
}
