<?php

use Illuminate\Database\Seeder;
use app\User;
use app\Car;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);
        factory(App\User::class, 50)->create()->each(function ($user) {
            $user->cars()->save(factory(App\Car::class)->make());});
    }
}