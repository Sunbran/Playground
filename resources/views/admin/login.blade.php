<!DOCTYPE html>
<html>
<head>
    <title>Password Form</title>
</head>
<body>
@extends('admin.layout')
@section('content')
    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" name="username" id="username">
        </div>
        <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password">
        </div>
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
   
    @endsection
</body>
</html>
