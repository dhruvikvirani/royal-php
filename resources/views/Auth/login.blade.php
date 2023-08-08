@extends('Layout.header')
@section('content')
<div class="card" style="width: 50rem;">
    <div class="card-header text-center">
        <h3>Login</h3>
    </div>
    <div >
    @if(session()->has('invalid'))
        <h5 class="text-danger text-left login-error p-2">{{ session('invalid') }}</h5>
    @endif
    </div>
    <div class="card-body">
        <form action="{{ route('authenticate') }}" method="POST">
            @csrf
            <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
            @error('email')
            <span style="color:red;">{{ $message }}</span>
            @enderror
            </div>
            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
            @error('password')
            <span style="color:red;">{{ $message }}</span>
            @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection