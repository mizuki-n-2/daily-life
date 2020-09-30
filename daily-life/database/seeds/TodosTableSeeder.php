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
            'user_id' => '1'
        ]);

        DB::table('todos')->insert([
            'todo' => 'run',
            'user_id' => '1'
        ]);

        DB::table('todos')->insert([
            'todo' => 'help',
            'user_id' => '2'
        ]);
    }
}
