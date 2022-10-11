<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'group_name' => 'フロントエンド基礎1(HTML/CSS)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'group_name' => 'フロントエンド基礎2(JavaScript/jQuery)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'group_name' => 'フロントエンド実践',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'group_name' => 'サーバーサイド基礎1(PHP)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'group_name' => 'サーバーサイド基礎2(DB)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'group_name' => 'サーバーサイド基礎',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'group_name' => '2022年10月',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'group_name' => '2022年11月',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];
        foreach($params as $param){
            DB::table('groups')->insert($param);
        }
    }
}
