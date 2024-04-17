@extends('layout.app')

@section('content')
    <div class="container mx-auto py-12">
        <h1 class="text-2xl font-bold mb-8">Welcome to Your Wishlist</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach (session('wishlist') as $id => $details)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <a href="{{ url('products/' . $id . '/detail') }}">
                        <img class="w-full h-48 object-cover mb-4" src="{{ asset($details['image']) }}" alt="Product Image">
                    </a>
                    <p class="text-lg font-semibold mb-2">{{ $details['title'] }}</p>
                    <p class="text-gray-700">{{ $details['price'] }} MAD</p>
                    <div class="flex justify-between mt-4">
                        <a href="{{ route('addproduct.to.cart', $id) }}" class="text-blue-500 hover:text-blue-700">
                            Add to Cart
                        </a>
                        <form action="{{ route('wishlist.delete', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                Remove
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
