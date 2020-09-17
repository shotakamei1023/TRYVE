<?php

use Illuminate\Database\Seeder;
use App\Content;


class contentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'title' => 'サンプル1',
            'address_first' => '東京都',
            'address_last' => 'テスト1',       
            'price' => '1000',
            'order' => 'テスト1',
            'owner_id' => 1 ,
        ];
        $ContentData = new Content;
        $ContentData -> fill($param) ->save();
                $param = [
            'title' => 'サンプル2',
            'address_first' => '東京都',
            'address_last' => 'テスト2',       
            'price' => '2000',
            'order' => 'テスト2',
            'owner_id' => 2,
        ];
        $ContentData = new Content;
        $ContentData -> fill($param) ->save();

                $param = [
            'title' => 'サンプル3',
            'address_first' => '東京都',
            'address_last' => 'テスト3',       
            'price' => '3000',
            'order' => 'テスト3',
            'owner_id' => 2,
        ];
        $ContentData = new Content;
        $ContentData -> fill($param) ->save();
    }
}