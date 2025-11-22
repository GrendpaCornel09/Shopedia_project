<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Shopedia')</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('extra-css')
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <nav>
        <div>
            <strong>Shopedia</strong>
        </div>

        <div>
            @auth
            {{-- logged in --}}
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard')?'active':'' }}">Dashboard</a>
                <a href="{{ route('products.create') }}" class="{{ request()->routeIs('products.create')?'active':'' }}">Add Products</a>
                <a href="{{ route('countries.create') }}" class="{{ request()->routeIs('countries.create')?'active':'' }}">Add Countries</a>
                <a href="{{ route('categories.create') }}" class="{{ request()->routeIs('categories.create')?'active':'' }}">Add Categories</a>
            @else
            {{-- unlogged in --}}
                <a href="{{ route('homepage') }}" class="{{ request()->routeIs('homepage')?'active':'' }}">Homepage</a>
                <a href="{{ route('loginpage') }}" class="{{ request()->routeIs('loginpage')?'active':'' }}">Login</a>
                <a href="{{ route('registerpage') }}" class="{{ request()->routeIs('registerpage')?'active':'' }}">Register</a>
            @endauth
        </div>
    </nav>

    <main>
        @if ($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
        <div class="success-message">
            {{ session('error') }}
        </div>
        @endif

        @yield('content')
    </main>

    <footer>
        <p>&copy; 2025 Shopedia. All rights reserved.</p>
        <p>Made with 💗 by GrendpaCornel09 on GitHub.</p>
    </footer>

    {{-- @yield('extra-js') --}}
</body>
</html>