<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Content;

class Test1 extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test1()
    {
    factory(User::class)->create([
        'name' => 'name',
        'email' => 'BBB@CCC.COM',
        'password' => 'ABCABC',
    ]);
    factory(User::class, 10)->create();

    $this->assertDatabaseHas('users',[
        'name' => 'AAA',
        'email' => 'BBB@CCC.COM',
        'password' => 'ABCABC',
    ]);

    factory(Content::class)->create([
        'title' => 'AAA',
        'price' => 1000,
        'order' => 'AAA',
        'placename' => 'AAA',
        'gmap' => 'AAA',
        'prefectures' => 'AAA',
        'address' => 'AAA',
        'value' => 1,
        'content_status' => 1,
        'report_status' => 1,
    ]);
    factory(Content::class, 10)->create();

    $this->assertDatabaseHas('users',[
        'title' => 'AAA',
        'price' => 1000,
        'order' => 'AAA',
        'placename' => 'AAA',
        'gmap' => 'AAA',
        'prefectures' => 'AAA',
        'address' => 'AAA',
        'value' => 1,
        'content_status' => 1,
        'report_status' => 1,
    ]);
    }
}