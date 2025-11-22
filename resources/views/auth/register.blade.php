@extends('layouts.app')

@section('title','Register Page')

@section('content')
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form class="register-form" method="POST" action="{{ route('register') }}">
    @csrf
    <h3>Registration Form</h3>

    <div class="reg-fields-container">
        <div>
            <label for="name">Name</label>
            <input type="text" placeholder="Your name" id="name" name="name" value="{{ old('name') }}" required>

            <label for="email">Email</label>
            <input type="email" placeholder="Email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" placeholder="Password" id="password" name="password" required>

            <label for="password_confirmation">Confirm Password</label>
            <input type="password" placeholder="Password" id="password_confirmation" name="password_confirmation" required>
        </div>
    </div>


    <button type="submit">Register</button>
</form>
@endsection
