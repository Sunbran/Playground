<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminLogoutTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_admin_logout_page(): void
{
    $response = $this->get(route('admin.logout'));

    $response->assertStatus(302);
}

public function test_admin_logout_submit(): void
{
    $response = $this->post(route('admin.logout.submit'));
    $response->assertStatus(302);
    $response->assertRedirect(route('admin.login'));
}
}
