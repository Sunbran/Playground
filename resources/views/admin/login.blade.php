<!DOCTYPE html>
<html>
<head>
    <title>Password Form</title>
</head>
<body>

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <button type="submit">Submit</button>
    </form>
    
   
    
</body>
</html>
