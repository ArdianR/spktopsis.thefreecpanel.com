@extends('layouts.login')

@section('content')
<div class="container">
    <div class="sin-w3-agile">
        <h2>Sign Up</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="username">
                <span class="username">Username:</span>
                <input id="name" type="text" class="name{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                <div class="clearfix"></div>
            </div>
            <div class="username">
                <span class="username">Email:</span>
                <input id="email" type="email" class="name{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <div class="clearfix"></div>
            </div>
            <div class="password-agileits">
                <span class="username">Password:</span>
                <input id="password" type="password" class="password{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <div class="clearfix"></div>
            </div>
            <div class="password-agileits">
                <span class="username">Confirm Password:</span>
                <input id="password-confirm" type="password" class="password" name="password_confirmation" required>
                <div class="clearfix"></div>
            </div>
            <div class="login-w3">
                <input type="submit" class="login" value="Sign Up">
            </div>
            <div class="clearfix"></div>
        </form>
        <div class="back">
            <a href="{{ url('/') }}">Sign In</a>
        </div>
        <div class="footer">
            <p>&copy; 2016 Pooled . All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
        </div>
    </div>
</div>
@endsection
