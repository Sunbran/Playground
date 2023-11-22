@extends('admin.layout')
@section('content')
    
    
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <h1>Create a News article</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <form method="post" action="{{route('admin.news.store')}}">
                @csrf 
                @method('post')
                
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" placeholder="Title" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select id="category" name="category" class="form-control">
                        <option value="" disabled selected>Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea id="content" name="content" rows="6" placeholder="Content" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit News</button>
            </form>
        </div>
    </div>
</div>

@endsection
