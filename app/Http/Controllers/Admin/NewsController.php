<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return view('admin.index', ['news' => $news]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|string',
                'category' => 'required|string',
                'content' => 'required|string',
            ]
        );

        $newArticle = News::create($data);

        return redirect(route('admin.news.index'));
    }

    public function edit(News $news)
    {
        return view('admin.edit', ['news' => $news]);
    }

    public function update(News $news, Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|string',
                'category' => 'nullable|exists:categories,id',
                'content' => 'required|string',
            ]
        );

        $news->update($data);

        return redirect(route('admin.news.index'))->with('success', 'News Updated Successfully');
    }

    public function delete(News $news)
    {
        $news->delete();

        return redirect(route('admin.news.index'))->with('success', 'News Deleted Successfully');
    }
}
