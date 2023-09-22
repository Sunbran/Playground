<!DOCTYPE html>
<html>
<head>
    <title>Password Form</title>
</head>
<body>
    <form method="POST" action="{{ route('check.password') }}">
        @csrf
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <button type="submit">Submit</button>
    </form>
</body>
</html>