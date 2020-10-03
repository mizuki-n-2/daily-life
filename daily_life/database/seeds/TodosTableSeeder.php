<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            'todo' => 'study',
            'user_id' => '1',
            'time_limit' => '2020-10-05 00:00:00',
            'status' => '進行中'
        ]);

        DB::table('todos')->insert([
            'todo' => 'run',
            'user_id' => '1',
            'time_limit' => '2020-10-06 00:00:00',
            'status' => '未着手'
        ]);

        DB::table('todos')->insert([
            'todo' => 'help',
            'user_id' => '2',
            'time_limit' => '2020-10-07 00:00:00',
            'status' => '完了'
        ]);
    }
}
