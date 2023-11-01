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
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password">
                <button type="submit" class="btn btn-primary">Submit</button>
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
        </div>
    </div>
</div>
        
        

    </form>
    
   
    @endsection
</body>
</html>
