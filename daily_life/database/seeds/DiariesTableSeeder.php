<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DiariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diaries')->insert([
            'user_id' => '1',
            'title' => 'help',
            'content' => 'hellohello',
            'image' => 'url'
        ]);

        DB::table('diaries')->insert([
            'user_id' => '1',
            'title' => 'hello',
            'content' => 'everyone',
            'image' => 'url'
        ]);

        DB::table('diaries')->insert([
            'user_id' => '2',
            'title' => 'good',
            'content' => 'hahaha',
            'image' => 'url'
        ]);
    }
}
