@extends('layouts.app')

@section('content')
<div class="container" style="max-width:600px;margin:40px auto;">
    <h2 style="text-align:center;margin-bottom:24px;">User Dashboard</h2>
    <div style="background:#fff;padding:32px 24px;border-radius:10px;box-shadow:0 2px 12px #0001;">
        <p>Welcome, <strong>{{ Auth::user()->name }}</strong>!</p>
        <p>This is your dashboard. You can manage your profile and see your activity here.</p>
    </div>
</div>
@endsection
