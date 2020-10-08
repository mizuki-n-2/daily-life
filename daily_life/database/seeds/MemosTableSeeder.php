<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('memos')->insert([
            'memo_name' => 'memo1',
            'memo' => 'hello',
            'user_id' => '1'
        ]);
    }
}
