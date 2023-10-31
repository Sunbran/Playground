<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>News</h1>
    <div>
        @if(session()->has('success'))
          <div>
            {{session('success')}}
          </div>
        @endif
    </div>
    <a href="{{route('admin.news.create')}}">Create News</a>
    <table class="table table-striped">
      <tr>
        <th>Title</th>
        <th>Category</th>
        <th>Content</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      @foreach($news as $newss)
        <tr>
            <td>{{$newss->title}}</td>
            <td>{{$newss->category->name}}</td>
            <td>{{$newss->content}}</td>
            <td>
                <a href="{{route('admin.news.edit', ['news' => $newss])}}">Edit</a>
            </td>
            <td>
            <form method="post" action="{{route('admin.news.delete', ['news' => $newss])}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
      @endforeach
    </table>
</body>
</html>