<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);

        #login認証がないルート
        $response = $this->get('/');
        $response->assertStatus(200);
        
        $response = $this->get('/contents');
        $response->assertStatus(200);

        #login認証があるルートに対して認証無しでのアクセス
        $response = $this->get('/mypage');
        $response->assertStatus(302);

        $response = $this->get('/mypage/edit');
        $response->assertStatus(302);

        $response = $this->get('/contents/create');
        $response->assertStatus(302);


        #login認証があるルートに対して認証ありでのアクセス
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/mypage');
        $response->assertStatus(200);

        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/mypage/edit');
        $response->assertStatus(200);

        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/contents/create');
        $response->assertStatus(200);


        #ルートが存在しない場所
        $response = $this->get('/no_routes');
        $response->assertStatus(404);
    }
}