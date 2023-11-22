<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of news.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $news = News::all();

        return view('admin.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new news article.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created news article in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'category' => 'required|exists:categories,id',
            'content' => 'required|string',
        ]);
        $category = Category::find($data['category']);
        if ($category) {
            $newArticle = new News([
                'title' => $data['title'],
                'content' => $data['content'],
            ]);
            $category->news()->save($newArticle);

            return redirect(route('admin.news.index'));
        } else {
            return redirect(route('admin.news.create'))->with('error', 'Selected category does not exist.');
        }
    }

    /**
     * Show the form for editing the specified news article.
     *
     * @return \Illuminate\View\View
     */
    public function edit(News $news)
    {
        $categories = Category::all(); // Fetch the categories from your database

        return view('admin.edit', ['news' => $news, 'categories' => $categories]);

    }

    /**
     * Update the specified news article in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(News $news, Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|string',
                'category' => 'required|exists:categories,id',
                'content' => 'required|string',
            ]
        );

        $news->update($data);

        return redirect(route('admin.news.index'))->with('success', 'News Updated Successfully');
    }

    /**
     * Remove the specified news article from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(News $news)
    {
        $news->delete();

        return redirect(route('admin.news.index'))->with('success', 'News Deleted Successfully');
    }
}
