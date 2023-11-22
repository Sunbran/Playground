@extends('user.layout')

@section('content')
    <h1>Latest News</h1>
    <ul class="list-group">
        @foreach($news as $newsItem)
            <li class="list-group-item">
                <h4>{{ $newsItem->title }}</h4>
                <p>Category: {{ optional($newsItem->category)->name }}</p>
                <p>{{ $newsItem->content }}</p>
            </li>
        @endforeach
    </ul>
@endsection
