@extends('layouts.app')

@section('title','Register Page')

@section('content')
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form>
    <h3>Registration Form</h3>

    <label for="name">Name</label>
    <input type="text" placeholder="Your name" id="name">

    <label for="email">Email</label>
    <input type="email" placeholder="Email" id="email">

    <label for="password">Password</label>
    <input type="password" placeholder="Password" id="password">

    <button>Register</button>
</form>
@endsection
