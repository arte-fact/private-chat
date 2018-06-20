<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
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
}
