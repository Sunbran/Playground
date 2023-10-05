<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostSeederTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSeeder()
    {
        $this->artisan('db:seed', ['--class' => 'PostSeeder'])->assertExitCode(0);
    }
}
