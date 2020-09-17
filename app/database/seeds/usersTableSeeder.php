<?php

use Illuminate\Database\Seeder;
use App\User;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $param = [
            'name' => '学美四郎',
            'email' => 'sample01@gmail.com',
            'password' => 00000000       
        ];
        $UserData = new User;
        $UserData -> fill($param) ->save();

            $param = [
            'name' => 'かめい',
            'email' => 'sample02@gmail.com',
            'password' => 00000000       
        ];
        $UserData = new User;
        $UserData -> fill($param) ->save();

            $param = [
            'name' => 'しょうた',
            'email' => 'sample03@gmail.com',
            'password' => 00000000       
        ];
        $UserData = new User;
        $UserData -> fill($param) ->save();
    }
}