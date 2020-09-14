<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

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
            'name' => Config::get('api.apiName'),
            'email' => Config::get('api.apiEmail'),
            'password' => Hash::make(Config::get('api.apiPassword')),
        ]);
    }
}
