<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'mizuki',
            'email' => 'sample@com',
            'password' => 'hello'
        ]);

        DB::table('users')->insert([
            'name' => 'taro',
            'email' => 'test@com',
            'password' => 'good'
        ]);

        DB::table('users')->insert([
            'name' => 'jiro',
            'email' => 'hello@com',
            'password' => 'test'
        ]);
    }
}
