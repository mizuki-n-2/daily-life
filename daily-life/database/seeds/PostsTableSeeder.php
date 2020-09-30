<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'dairy1',
            'content' => 'hello',
            'image' => 'url01',
            'user_id' => '1'
        ]);

        DB::table('posts')->insert([
            'title' => 'dairy2',
            'content' => 'good',
            'image' => 'url02',
            'user_id' => '1'
        ]);

        DB::table('posts')->insert([
            'title' => 'dairy3',
            'content' => 'heyheyhey',
            'image' => 'url03',
            'user_id' => '2'
        ]);
    }
}
