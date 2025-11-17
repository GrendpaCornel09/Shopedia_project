@extends('layouts.app')

@section('title','Homepage')

@section('content')
    <div class="home-container">
        <h1>Welcome, {{ Auth::user()->name }}</h1>
        <p>Email: {{ Auth::user()->email }}</p>

        <div class="dashboard-actions">
            {{-- <a href="{{ route('items.create') }}" class="btn">Add New Item</a> --}}

            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-logout">Logout</button>
            </form>
        </div>
    </div>
@endsection