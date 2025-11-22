@extends('layouts.app')

@section('title','Homepage')

@section('content')
    <div class="home-container">
        <h1 style="z-index: 10">Welcome to Shopedia, Log In or Register to View Products</h1>
        {{-- <a href="{{ route('items.create') }}" class="btn">Add New Item</a> --}}
    </div>
@endsection