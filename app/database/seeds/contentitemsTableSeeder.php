<?php

use Illuminate\Database\Seeder;
use App\ContentItem;

class contentitemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $param = [
            'user_id' => 1,
            'content_id' => 1            
        ];
        $ContentitemData = new ContentItem;
        $ContentitemData -> fill($param) ->save();
        
        $param = [
            'user_id' => 2,
            'content_id' => 2            
        ];
        $ContentitemData = new ContentItem;
        $ContentitemData -> fill($param) ->save();

        $param = [
            'user_id' => 3,
            'content_id' => 2            
        ];
        $ContentitemData = new ContentItem;
        $ContentitemData -> fill($param) ->save();
    }
}