@extends('layout.app')

@section('content')

    @if ($wishlistItems->isEmpty())
        <div class="relative z-10">

            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="flex items-center justify-center font-bold pt-8 text-2xl">
                                Wishlist is empty
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <a href="{{ route('/') }}"
                                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Go
                                    back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
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
                            <a href="{{ route('wishlist.remove', $wishlistItem->id) }}"
                                class="text-red-500 hover:text-red-700">
                                Remove
                            </a>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
