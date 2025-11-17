@extends('layouts.app')

@section('title','Login Page')

@section('content')
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form>
    <h3>Login</h3>

    <label for="email">Email</label>
    <input type="email" placeholder="Email" id="email">

    <label for="password">Password</label>
    <input type="password" placeholder="Password" id="password">

    <button>Log In</button>
</form>
@endsection
