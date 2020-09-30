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

        DB::table('memos')->insert([
            'memo_name' => 'memo2',
            'memo' => 'good',
            'user_id' => '1'
        ]);

        DB::table('memos')->insert([
            'memo_name' => 'memo3',
            'memo' => 'hogehoge',
            'user_id' => '2'
        ]);
    }
}
