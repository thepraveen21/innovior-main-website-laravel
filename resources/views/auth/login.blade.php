@extends('layouts.app')

@section('content')
<div class="container" style="max-width:400px;margin:40px auto;">
    <h2 style="text-align:center;margin-bottom:24px;">Login</h2>
    <form method="POST" action="{{ route('login') }}" style="background:#fff;padding:32px 24px;border-radius:10px;box-shadow:0 2px 12px #0001;">
        @csrf
        <div style="margin-bottom:18px;">
            <label for="email" style="display:block;font-weight:600;margin-bottom:6px;">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus style="width:100%;padding:10px;border-radius:6px;border:1px solid #ccc;">
            @error('email')
                <span style="color:#d00;font-size:13px;">{{ $message }}</span>
            @enderror
        </div>
        <div style="margin-bottom:18px;">
            <label for="password" style="display:block;font-weight:600;margin-bottom:6px;">Password</label>
            <input id="password" type="password" name="password" required style="width:100%;padding:10px;border-radius:6px;border:1px solid #ccc;">
            @error('password')
                <span style="color:#d00;font-size:13px;">{{ $message }}</span>
            @enderror
        </div>
        <div style="margin-bottom:18px;">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">Remember Me</label>
        </div>
        <button type="submit" class="btn btn-primary" style="width:100%;padding:10px 0;font-weight:600;">Login</button>
        @if (Route::has('password.request'))
            <div style="text-align:right;margin-top:10px;">
                <a href="{{ route('password.request') }}">Forgot Your Password?</a>
            </div>
        @endif
    </form>
</div>
@endsection
