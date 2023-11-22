<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::paginate(10)->onEachSide(1);
        $categories = Category::all();

        return view('user.index', ['news' => $news, 'categories' => $categories]);
    }

    public function show(News $news)
    {
        return view('user.show', ['news' => $news]);
    }

    public function newsByCategory(Request $request, $category = null)
    {
        $categories = Category::all();

        if ($category) {
            $category = Category::where('name', $category)->firstOrFail();
            $news = $category->news;
        } else {
            $news = News::all();
        }

        return view('user.index', ['news' => $news, 'categories' => $categories]);
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('search');
        $news = News::where('title', 'like', '%'.$searchQuery.'%')
            ->orWhere('content', 'like', '%'.$searchQuery.'%')
            ->get();

        $categories = Category::all();

        return view('user.index', ['news' => $news, 'categories' => $categories]);
    }

    public function feedback(News $news, Request $request)
    {
        $request->validate([
            'feedback' => 'required|string',
        ]);

        $feedback = new class extends \stdClass
        {
            public $content;
        };

        $feedback->content = $request->input('feedback');

        $news->feedback()->create([
            'content' => $feedback->content,
        ]);

        return redirect()->back()->with('success', 'Feedback submitted successfully.');
    }
}
