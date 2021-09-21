@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 45px">
            <div class="col-md-4 offset-md-4">
                <h4 class="text-primary">Admin Registration</h4>
                <form action="{{ route('auth.save') }}" method="POST">
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="name">Enter your Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your Name" value="{{ old('name') }}">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                             @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="email">Enter your Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your Name" value="{{ old('email') }}">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="Password">Enter your Password</label>
                        <input type="Password" id="Password" name="password" class="form-control" placeholder="Enter your Name" >
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Sign Up</button>
                </form>
                <br>
                <a href="{{ route('auth.login') }}">I already have an account,  sign in</a>
            </div>
        </div>
    </div>
@endsection
