<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  DB::table('users')->insert([
        'user_id' => factory(App\User::class),
        'make' => Str::random(7),
        'model' => Str::random(10),
        'year' => '2015-12-31 00:00:00',
        ]);
    }
}