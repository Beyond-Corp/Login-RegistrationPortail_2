@extends('layout')

@section('content')
<div class="container mt-3">
    <h2>Login page</h2>

    @if(Session::has('success'))
    <div class="alert alert-success mt-3">
        {{ Session::get('success') }}
    </div>
    @endif

    <form method="post" action="{{ route('post-login') }}">
        @csrf
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">

            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">

            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
