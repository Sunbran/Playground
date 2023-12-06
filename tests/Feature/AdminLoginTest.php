<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_admin_login_page_is_redered(): void
    {
        $response = $this->get(route('admin.login'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.login');
    }

    public function test_admin_login_submit(): void
{
    $username = config('admin.username');
    $password = config('admin.password');

    $response = $this->post(route('admin.login.submit'), [
        'username' => $username,
        'password' => $password,
    ]);

    $this->assertTrue(session()->has('userHasAccessToTheContent'));

    $response->assertRedirect(route('admin.news.index'));
}
}
