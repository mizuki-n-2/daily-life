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
            'year' => '2020',
            'month' => '9',
            'date' => '12',
            'day' => '月',
            'time' => '10:00'
        ]);
    }
}
