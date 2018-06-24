<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;


    /**
     * @test
     * A basic test example.
     *
     * @return void
     */
    public function canCreateConversation()
    {
        $this->artisan("passport:install");

        $userFriend = User::create([
            "name" => "toto",
            "email" => "toto@toto.toto",
            "password" => "secret",
            "password_confirmation" => "secret"
        ]);

        $user = User::create([
            "name" => "tata",
            "email" => "tata@toto.toto",
            "password" => "secret",
            "password_confirmation" => "secret"
        ]);

        $this->actingAs($user, 'api')->postJson('api/conversations', [
            "user_id" => $userFriend->id,
            "client_id" => "4",
            "client_secret" => "Vj8hhpSjxLGGmLUVmE8qoaXetpT4YFrFXkdlEigG",
            "scope" => "*",
            "grant_type" => "password"
        ])->dump()
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function canGetUserNumber()
    {
        $response = $this->postJson('api/user-number', [
            "username" => "hughomzngpùzzegzg@hgzuhu.gez",
            "password" => "secret",
            "password_confirm" => "secret",
            "client_id" => "4",
            "client_secret" => "6KdGPLinH0kVzfPofh15iYSSFiUyPsw793pF0gSK",
            "scope" => "*",
            "grant_type" => "password"
        ])->dump();

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function canGetConversations()
    {

    }
}
