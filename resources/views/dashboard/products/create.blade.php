@extends('layout.appDashboard')
@section('dashboardcontent')
    <div class="w-full bg-gray-100">
        <header class="flex items-center h-20 px-6 sm:px-10 bg-white w-full">
            <button
                class="block sm:hidden relative flex-shrink-0 p-2 mr-2 text-gray-600 hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-800 rounded-full">
                <span class="sr-only">Menu</span>
                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </button>
            <div class="relative w-full max-w-md sm:-ml-2">
                <svg aria-hidden="true" viewBox="0 0 20 20" fill="currentColor"
                    class="absolute h-6 w-6 mt-2.5 ml-2 text-gray-800">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd" />
                </svg>
                <input type="text" role="search" placeholder="Search..."
                    class="py-2 pl-10 pr-4 w-full border-4 border-transparent placeholder-gray-400 focus:bg-gray-50 rounded-lg" />
            </div>
            <div class="flex flex-shrink-0 items-center ml-auto">
                <button class="inline-flex items-center p-2 hover:bg-gray-100 focus:bg-gray-100 rounded-lg">
                    <span class="sr-only">User Menu</span>
                    <div class="hidden md:flex md:flex-col md:items-end md:leading-tight">
                        <span class="font-semibold">Grace Simmons</span>
                        <span class="text-sm text-gray-600">Lecturer</span>
                    </div>
                    <span class="h-12 w-12 ml-2 sm:ml-3 mr-2 bg-gray-100 rounded-full overflow-hidden">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="user profile photo"
                            class="h-full w-full object-cover">
                    </span>
                    <svg aria-hidden="true" viewBox="0 0 20 20" fill="currentColor"
                        class="hidden sm:block h-6 w-6 text-gray-800">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="border-l pl-3 ml-3 space-x-1">
                    <button
                        class="relative p-2 text-gray-800 hover:bg-gray-100 hover:text-gray-600 focus:bg-gray-100 focus:text-gray-600 rounded-full">
                        <span class="sr-only">Notifications</span>
                        <span class="absolute top-0 right-0 h-2 w-2 mt-1 mr-2 bg-red-500 rounded-full"></span>
                        <span class="absolute top-0 right-0 h-2 w-2 mt-1 mr-2 bg-red-500 rounded-full animate-ping"></span>
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                    <button
                        class="relative p-2 text-gray-800 hover:bg-gray-100 hover:text-gray-600 focus:bg-gray-100 focus:text-gray-600 rounded-full">
                        <span class="sr-only">Log out</span>
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </div>
            </div>
        </header>
        <h1 class="pl-8 pt-8 text-[2rem] text-gray-700">Add Product</h1>
        <div class="p-6 overflow-scroll px-0">
            <a href="{{ url('products')}}"
                class="ml-6 text-[.75rem] p-2 text-gray-500 border-b border-dotted">
                <- Back to previous page </a>
                    @if (session('status'))
                        
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 w-[97%] ml-6"
                            role="alert">
                            <div class="flex">
                                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                    </svg></div>
                                <div>
                                    <p class="font-bold">{{ session('status') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="w-full min-w-max p-8 text-center flex flex-col items-center justify-center">
                        <div class="bg-gray-100 transition-colors duration-300 w-[75vw] h-[70vh]">
                            <div class="container mx-auto  p-4">
                                <div class="bg-white shadow rounded-lg p-6">
                                    <form action="{{ url('products/create') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                            <input type="text" placeholder="Product name"
                                                class="border p-2 rounded w-full" name="title" required
                                                value="{{ old('title') }}">
                                            @error('title')
                                                <span class="text-red-700">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <input type="email" placeholder="Email address" value="{{ $user->email }}"
                                                class="border p-2 rounded w-full cursor-not-allowed" name="email"
                                                disabled>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <input type="number" placeholder="quantity In Stock"
                                                class="border p-2 rounded w-full" name="quantityInStock"
                                                value="{{ old('quantityInStock') }}">
                                            @error('quantityInStock')
                                                <span class="text-red-700">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <input type="number" placeholder="Product price"
                                                class="border p-2 rounded w-full" name="price"
                                                value="{{ old('price') }}">
                                            @error('price')
                                                <span class="text-red-700">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <select name="category_id" id="category_id"
                                                class="border p-2 rounded w-full">
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="text-red-700">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="flex items-center justify-center w-full">
                                            <label for="dropzone-file"
                                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 ">
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-8 h-8 mb-4 text-gray-500 " aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                    </svg>
                                                    <p class="mb-2 text-sm text-gray-500 "><span
                                                            class="font-semibold">Click to
                                                            upload</span>
                                                        or drag and drop</p>
                                                    <p class="text-xs text-gray-500 ">SVG, PNG, JPG or GIF (MAX.
                                                        800x400px)</p>
                                                </div>
                                                <input id="dropzone-file" type="file" class="hidden"
                                                    name="image" />
                                            </label>
                                        </div>

                                        <div class="mb-4">
                                            <textarea name="description" id="myeditorinstance" cols="30" rows="10"></textarea>
                                        </div>
                                        <button type="submit"
                                            class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 focus:outline-none transition-colors">
                                            SUBMIT
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
        </div>
    </div>
@endsection
