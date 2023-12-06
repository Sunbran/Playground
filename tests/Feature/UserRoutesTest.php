<?php

namespace Tests\Feature;

use App\Models\News;    
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRoutesTest extends TestCase
{
    /**
     * A test for the user index page.
     */
    public function test_user_index_page(): void
    {
        $response = $this->get(route('user.home'));

        $response->assertStatus(200);
        $response->assertViewIs('user.index');
    }

    /**
     * A test for the user index page.
     */
    public function test_user_news_show_page(): void
    {
        $this->withoutExceptionHandling();
        $news = News::factory()->create();
        $response = $this->get(route('user.news.show', ['news' => $news]));

        $response->assertStatus(200);
        $response->assertViewIs('user.show');
    }

    public function test_user_news_filter_page(): void
    {
        $this->withoutExceptionHandling();

        $category = Category::factory()->create();
        $news1 = News::factory()->create(['title' => 'News 1', 'category_id' => $category->id]);
        $news2 = News::factory()->create(['title' => 'News 2', 'category_id' => $category->id]);
        $news3 = News::factory()->create(['title' => 'News 3', 'category_id' => $category->id]);

        $response = $this->get(route('user.news.filter', ['category' => $category->name]));

        $response->assertStatus(200);
        $response->assertViewIs('user.index');
        $response->assertViewHas('news'); 
    }

    public function test_user_news_feedback(): void
{
    $news = News::factory()->create();

    $feedbackData = [
        'feedback' => 'This is a test feedback.',
    ];

    $response = $this->post(route('user.news.feedback', ['news' => $news]), $feedbackData);

    $response->assertStatus(302); 
    $response->assertSessionHas('success', 'Feedback submitted successfully.');

    
    $this->assertDatabaseHas('feedback', [
        'news_id' => $news->id,
        'content' => $feedbackData['feedback'],
    ]);
}
}
