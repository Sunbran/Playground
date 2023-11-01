<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('admin.layout')
@section('content')
    <h1>News</h1>

    @if(Session::has('userHasAccessToTheContent'))
                <form method="POST" action="{{ route('admin.logout.submit') }}">
                   @csrf
                   <button type="submit" class="btn btn-warning">Logout</button>
                 </form>
                @endif
    <div>
        @if(session()->has('success'))
          <div>
            {{session('success')}}
          </div>
        @endif
    </div>
    <ul class="list-group">
    @foreach($news as $newss)
    <li class="list-group-item">
        <h4>{{$newss->title}}</h4>
        <p>Category: {{$newss->category->name}}</p>
        <p>{{$newss->content}}</p>
        <div class="btn-group" role="group" aria-label="Actions">
            <form method="get" action="{{route('admin.news.edit', ['news' => $newss])}}">
                @csrf
                @method('get')
                <button type="submit" class="btn btn-info">Edit</button>
            </form>
            <form method="post" action="{{route('admin.news.delete', ['news' => $newss])}}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </li>
    @endforeach
</ul>
                <form method="get" action="{{route('admin.news.create', ['news' => $newss])}}">
                    @csrf
                    @method('get')
                    <button type="submit" class="btn btn-success"">Create News</button>
                </form>

@endsection
</body>
</html>