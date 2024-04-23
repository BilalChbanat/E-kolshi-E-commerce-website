@extends('layout.app')

@section('title')
    Home
@endsection

@section('content')
    <div class="mb-16 px-4 mt-8 sm:px-10">
        <div class="w-full  mx-auto max-w-7xl">
            <div class="mx-auto max-w-8xl sm:px-6 lg:px-8">
                <div
                    class="relative isolate overflow-hidden bg-white px-6 py-20 text-center sm:px-16 sm:shadow-sm dark:bg-transparent">
                    <p class="mx-auto text-primary-300 max-w-2xl text-3xl font-bold tracking-tight   sm:text-4xl">
                        Didn't find component you were looking for?
                    </p>
                    <p class="mx-auto text-primary-300  text-sm font-bold tracking-tight">
                        Welcome to the heart of E-kolshi, where every click opens a door to a world of Moroccan
                        craftsmanship and style. Welcome to the heart of E-kolshi, where every click opens a door to a
                        world of Moroccan craftsmanship and style. Our 'All Products' page is a treasure trove, presenting a
                        comprehensive collection that embodies the essence of Morocco.
                    </p>

                    <div id='search-form'>
                        <label
                            class="mx-auto mt-8 relative bg-white min-w-sm max-w-4xl flex flex-col md:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-2xl focus-within:border-gray-300"
                            for="search-bar">
                            <input id="search" placeholder="your keyword here" name="search"
                                class="px-6 py-2 w-2/3 max-w-2xl rounded-md flex-1 outline-none bg-white" required="">
                            <button type="submit"
                                class="w-1/3 md:w-auto px-6 py-3 bg-primary-300 border-primary-100 text-white fill-white active:scale-95 duration-100 border will-change-transform overflow-hidden relative rounded-xl transition-all">
                                <div class="flex items-center transition-all opacity-1">
                                    <span class="text-sm font-semibold whitespace-nowrap truncate mx-auto">
                                        Search
                                    </span>
                                </div>
                            </button>

                            <select id="categories" name="categorie"
                                class="w-1/3 md:w-auto px-6 py-2 text-primary-300 border-primary-100 fill-white active:scale-95 duration-100 border will-change-transform overflow-hidden relative rounded-xl transition-all">
                                <option class="text-primary-300" value="" selected="">All</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                @endforeach
                            </select>

                        </label>
                    </div>


                </div>
            </div>
            <!---product cart--->
            <div id="product_container" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="p-8 bg-white rounded-lg shadow-lg ">
                        <div class="relative overflow-hidden">
                            <img class="object-cover " src="{{ asset("$product->image") }}" alt="Product"
                                style="width: 300px; height: 250px;">
                            <div class="absolute inset-0 bg-black opacity-40"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <a href="{{ url('products/' . $product->id . '/detail') }}"
                                    class="px-6 py-2 font-bold text-gray-900 bg-white rounded-full hover:bg-gray-300">View
                                    Product</a>
                            </div>
                        </div>

                        <h3 class="mt-4 text-xl font-bold text-gray-900">{{ $product->title }}</h3>
                        @php
                            if (strlen($product->description) > 150) {
                                $product->shortDescription = substr($product->description, 0, 150) . '...';
                            } else {
                                $product->shortDescription = $product->description;
                            }

                        @endphp
                        <p class="mt-2 text-sm text-gray-500 min-w-24 max-h-28 min-h-28">{{ $product->shortDescription }}</p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-lg font-bold text-gray-900">{{ $product->price }}$</span>

                            <a href="{{ route('cart.add', $product->id) }}"
                                class="px-4 py-2 font-bold text-white bg-primary-100 rounded-full hover:bg-primary-300">Add
                                to Cart</a>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/filters.js')}}"></script>
@endsection