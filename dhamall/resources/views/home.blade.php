@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <!-- Hero Section -->
        <div class="bg-blue-500 text-white text-center py-16">
            <h1 class="text-4xl font-bold">Experience True Wireless Freedom</h1>
            <p class="mt-4">Crystal clear sound, powerful bass, and all-day battery life.</p>
            <a href="#shop" class="mt-6 bg-white text-blue-500 px-6 py-3 rounded-full inline-block">Shop Now</a>
        </div>
        
        <!-- Featured Products -->
        <section class="py-12" id="shop">
            <h2 class="text-3xl font-bold text-center mb-8">Top Selling Earbuds</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($earbuds as $earbud)
                    <div class="border rounded-lg p-4 shadow-lg">
                        <img src="{{ asset($earbud->image ?? 'images/default-product.jpg') }}" alt="{{ $earbud->name }}" class="w-full h-48 object-cover">
                        <h3 class="text-xl font-bold mt-4">{{ $earbud->name }}</h3>
                        <p class="text-gray-600">{{ $earbud->description }}</p>
                        <p class="text-lg font-semibold mt-2">${{ $earbud->price }}</p>
                        <a href="{{ route('product.show', $earbud->id) }}" class="block text-center bg-blue-500 text-white px-4 py-2 mt-4 rounded">View Details</a>
                    </div>
                @endforeach
            </div>
        </section>
        
        <!-- Categories -->
        <section class="py-12">
            <h2 class="text-3xl font-bold text-center mb-8">Shop by Category</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="relative bg-gray-200 p-6 rounded-lg">
                    <h3 class="text-2xl font-semibold">Noise Cancelling</h3>
                    <p>Block out distractions and immerse in pure sound.</p>
                    <a href="#" class="text-blue-500 mt-4 inline-block">Shop Now</a>
                </div>
                <div class="relative bg-gray-200 p-6 rounded-lg">
                    <h3 class="text-2xl font-semibold">Long Battery Life</h3>
                    <p>Stay connected all day with extended battery power.</p>
                    <a href="#" class="text-blue-500 mt-4 inline-block">Shop Now</a>
                </div>
            </div>
        </section>
        
        <!-- Customer Reviews -->
        <section class="py-12">
            <h2 class="text-3xl font-bold text-center mb-8">What Our Customers Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($reviews as $review)
                    <div class="border p-4 rounded-lg shadow-md">
                        <p class="italic">"{{ $review->comment }}"</p>
                        <p class="font-semibold mt-2">- {{ $review->user->name }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
