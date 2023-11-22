<!-- user/show.blade.php -->

@extends('user.layout')

@section('content')
    <h1>{{ $news->title }}</h1>
    <p>Category: {{ optional($news->category)->name }}</p>
    <p>{{ $news->content }}</p>

    <form method="post" action="{{ route('user.news.feedback', ['news' => $news]) }}">
        @csrf
        <div class="form-group">
            <label for="feedback">Your Feedback:</label>
            <textarea id="feedback" name="feedback" rows="4" class="form-control" placeholder="Enter your feedback"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Feedback</button>
    </form>
@endsection
