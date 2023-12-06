<?php

namespace Tests\Feature;

use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrudMethodsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_admin_news_index_page(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(302);
        $response->assertViewIs('admin.index');
    }

    /**
     * Test the admin news create page.
     */
    public function test_admin_news_create_page(): void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(302);
        $response->assertViewIs('admin.create');
    }

    /**
     * Test storing a new news post.
     */
    public function test_store_new_news_post(): void
    {
        $data = [
            'title' => 'Test News Title',
            'content' => 'Test news content.',
        ];

        $response = $this->post(route('admin.news.store'), $data);

        $response->assertStatus(302); 
        $this->assertDatabaseHas('news', $data); 
    }

    /**
     * Test the admin news edit page.
     */
    public function test_admin_news_edit_page(): void
    {
        $news = News::factory()->create();

        $response = $this->get(route('admin.news.edit', ['news' => $news]));

        $response->assertStatus(302);
        $response->assertViewIs('admin.news.edit');
    }

    /**
     * Test updating an existing news post.
     */
    public function test_update_existing_news_post(): void
    {
        $news = News::factory()->create();

        $data = [
            'title' => 'Updated Title',
            'content' => 'Updated content.',
        ];

        $response = $this->put(route('admin.news.update', ['news' => $news]), $data);

        $response->assertStatus(302); 
        $this->assertDatabaseHas('news', $data); 
    }

    /**
     * Test deleting a news post.
     */
    public function test_delete_news_post(): void
    {
        $news = News::factory()->create();

        $response = $this->delete(route('admin.news.delete', ['news' => $news]));

        $response->assertStatus(302); 
        
    }
}
