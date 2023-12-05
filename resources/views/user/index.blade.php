@extends('user.layout')

@section('content')
    <h1>Latest News</h1>

    <form method="get" action="{{ route('user.news.filter') }}">
        @csrf
        <div class="form-group">
            <label for="search">Search by Title or Content:</label>
            <input type="text" id="search" name="search" class="form-control" placeholder="Enter search term">
        </div>

        <div class="form-group">
            <label for="category">Filter by Category:</label>
            <select id="category" name="category" class="form-control">
                <option value="" selected>All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Apply Filter</button>
    </form>

    <ul class="list-group">
        @forelse($news as $newsItem)
            <li class="list-group-item">
                <h4><a href="{{ route('user.news.show', ['news' => $newsItem]) }}">{{ $newsItem->title }}</a></h4>
                <p>Category: {{ optional($newsItem->category)->name }}</p>
            </li>
        @empty
            <li class="list-group-item">No news found.</li>
        @endforelse
    </ul>
@endsection
