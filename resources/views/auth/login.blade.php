@extends('layouts.login')

@section('content')
<div class="container">
    <div class="sin-w3-agile">
        <h2>Sign In</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="username">
                <span class="username">Username:</span>
                <input id="email" type="email" class="name{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
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
            <div class="rem-for-agile">
                <input class="remember" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <a href="{{ route('password.request') }}">Forgot Password</a><br>
            </div>
            <div class="login-w3">
                <input type="submit" class="login" value="Sign In">
            </div>
            <div class="clearfix"></div>
        </form>
        <div class="back">
            <a href="{{ url('/register') }}">Sign Up</a>
        </div>
        <div class="footer">
            <p>&copy; 2016 Pooled . All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
        </div>
    </div>
</div>
@endsection
