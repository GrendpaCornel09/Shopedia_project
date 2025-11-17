@extends('layouts.app')

@section('title','Login Page')

@section('content')
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <h3>Login</h3>

    <label for="email">Email</label>
    <input type="email" placeholder="Email" id="email" name="email">

    <label for="password">Password</label>
    <input type="password" placeholder="Password" id="password" name="password">

    <button type="submit">Log In</button>
</form>
@endsection
