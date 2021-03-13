<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
// use Faker\Generator as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = [
        [
          "name" => "Marco Busellato",
          "password" => "password",
          "email" => "marco.busellato@mail.com"
        ],
      ];

      // for ($i=0; $i < 5; $i++) {
      //   $newUser = new User();
      //   $newUser->name = $faker->name;
      //   $newUser->password = Hash::make('password');
      //   $newUser->email = $faker->email;
      //   $newUser->save();
      //
      // }
      foreach ($users as $user) {
        $newUser = new User();

        $user["password"] = Hash::make($user["password"]);
        $newUser->fill($user)->save();
      }

    }
}
