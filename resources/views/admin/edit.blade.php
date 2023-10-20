<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit a News article</h1>

    <div>
    @if($errors->any())
     <ul>
     @foreach ($errors->all() as $error)
     <li>{{$error}}</li>
     @endforeach
     </ul>
    @endif
    </div>
    
    <form method="post" action="{{route('admin.news.update', ['news' => $news])}}">
        @csrf 
        @method('put')
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{$news->title}}" required><br><br>

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" value="{{$news->category}}" required><br><br>

        <label for="content">Content:</label>
        <textarea id="content" name="content" rows="6" required>{{$news->content}}</textarea><br><br>

        <input type="submit" value="Edit News">
    </form>
</body>
</html>