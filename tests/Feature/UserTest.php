<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }



    public function test_home()
    {
        $this->get('/')
            ->assertSee('Home');
    }
    public function test_login()
    {
        $user = User::factory()->make();
        $this->actingAs($user)->get('/')
            ->assertSee('logout');
    }
}
