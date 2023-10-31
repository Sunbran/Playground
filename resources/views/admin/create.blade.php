<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" placeholder="Title" required><br><br>

        <label for="category">Category:</label>
        <select id="category" name="category_id" required>
            <option value="" disabled selected>Select a category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select><br><br>

        <label for="content">Content:</label>
        <textarea id="content" name="content" rows="6" placeholder="Content" required></textarea><br><br>

        <input type="submit" value="Submit News">
    </form>
</body>
</html>