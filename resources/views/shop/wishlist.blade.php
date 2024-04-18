@extends('layout.app')

@section('content')
    <div class="container mx-auto py-12">
        <h1 class="text-2xl font-bold mb-8">Welcome to Your Wishlist</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($wishlistItems as $wishlistItem)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <a href="{{ url('products/' . $wishlistItem->product->id . '/detail') }}">
                        <img class="w-full h-48 object-cover mb-4" src="{{ asset($wishlistItem->product->image) }}"
                            alt="Product Image">
                    </a>
                    <p class="text-lg font-semibold mb-2">{{ $wishlistItem->product->title }}</p>
                    <p class="text-gray-700">{{ $wishlistItem->product->price }} MAD</p>
                    <div class="flex justify-between mt-4">
                        <a href="{{ route('cart.add', $wishlistItem->product->id) }}"
                            class="text-blue-500 hover:text-blue-700">
                            Add to Cart
                        </a>
                        <a href="{{ route('cart.remove', $wishlistItem->product->id) }}"
                            class="text-red-500 hover:text-red-700">
                            Remove
                        </a>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
