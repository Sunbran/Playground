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

    public function filterNews(Request $request, $filter = null)
    {
        $categories = Category::all();
        $searchQuery = $request->input('search');
        $categoryFilter = $request->input('category');
    
        $news = News::with('category'); 
    
        if ($categoryFilter) {
            $news->whereHas('category', function ($query) use ($categoryFilter) {
                $query->where('name', $categoryFilter);
            });
        }
    
        if ($searchQuery) {
            $news->where(function ($query) use ($searchQuery) {
                $query->where('title', 'like', '%'.$searchQuery.'%')
                    ->orWhere('content', 'like', '%'.$searchQuery.'%');
            });
        }
    
        $news = $news->get();
    
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
