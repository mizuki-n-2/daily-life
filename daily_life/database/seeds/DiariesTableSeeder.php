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
            'year' => '2020',
            'month' => '2',
            'date' => '20',
            'day' => '金',
            'title' => 'help',
            'content' => 'hellohello',
            'image' => 'url'
        ]);
    }
}
