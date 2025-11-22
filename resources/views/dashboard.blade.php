@extends('layouts.app')

@section('title','Homepage')

@section('content')
    <div class="home-container">
        <h1>Welcome, {{ Auth::user()->name }}</h1>
        <p>Email: {{ Auth::user()->email }}</p>
        <div class="dashboard-actions">
            <form class="logout-form" method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-logout">Logout</button>
            </form>
        </div>
        <div class="line-break"></div>

        <h1 class="section">PRODUCTS</h1>

        <div class="products-display">
            @forelse ($products as $product)
                <div class="product-item">
                    <h2>Product Name: {{ $product->product_name }}</h2>
                    <p class="product-desc-regular">Category: {{ $product->category_id }}</p>
                    <p class="product-desc-regular">Country of Origin: {{ $product->country_of_origin_id }}</p>
                    <p class="product-desc-regular">Price: {{ $product->price }}</p>
                    <p class="product-desc-regular">Stock: {{ $product->stock }}</p>
                    <p class="product-desc-small">Last updated: {{ $product->updated_at }}</p>

                    <div class="item-actions">
                        <button>Delete</button>
                        <button>Update</button>
                    </div>
                </div>
            @empty
                <p>No products found.</p>
            @endforelse
        </div>

        <h1 class="section">CATEGORIES</h1>

        <div class="categories-display">
            @forelse ($categories as $category)
                <div class="category-item">
                    <h2>Category Name: {{ $category->category_name }}</h2>
                    <p>Category ID: {{ $category->id }}</p>
                    <p>Last updated:  {{ $category->updated_at }}</p>
                </div>
                <div class="item-actions">
                    <button>Delete</button>
                    <button>Update</button>
                </div>
            @empty
                <p>No categories found.</p>
            @endforelse
        </div>

        <h1 class="section">COUNTRIES OF ORIGIN</h1>

        <div class="countries-display">
            @forelse ($countries as $country)
                <div class="country-item">
                    <h2>Country: {{ $country->country_of_origin }}</h2>
                    <p>Country ID: {{ $country->id }}</p>
                    <p>Last updated:  {{ $country->updated_at }}</p>
                </div>
                <div class="item-actions">
                    <button>Delete</button>
                    <button>Update</button>
                </div>
            @empty
                <p>No categories found.</p>
            @endforelse
        </div>
    </div>
@endsection