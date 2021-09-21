@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 45px">
            <div class="col-md-4 offset-md-4">
                <h4 class="text-success">Admin Login</h4>
                <hr>
                <form action="{{ route('auth.check') }}" method="POST">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="email">Enter Your Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your Email Address" value="{{ old('name') }}">
                        <span class="text-danger">@error('email')
                            {{ $message }}
                        @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Enter Your Email Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                        <span class="text-danger">@error('password')
                            {{ $message }}
                        @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Sign In</button>
                </form>
                <br>
                <a href="{{ route('auth.register') }}">I don't have an account, create new</a>
            </div>
        </div>
    </div>
@endsection