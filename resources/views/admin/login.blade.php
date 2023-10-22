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
        <button type="submit">Submit</button>
    </form>
</body>
</html>
