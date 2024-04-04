@extends('layout.app')
@section('content')
    <section class="bg-gray-50 h-[170vh]">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">

            <div class="w-full mt-[30rem] bg-white rounded-lg shadow border  sm:max-w-md xl:p-0  ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                        Create and account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Your
                                name</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                placeholder="Enter Your Name" required>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your
                                email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                placeholder="name@gmail.com" required>
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div
                            class="flex justify-center items-center border- pt-4 rounded-md border border-gray-400 border-dashed">
                            <label class="relative flex items-center p-3 -mt-5 rounded-full cursor-pointer"
                                htmlFor="description">
                                <input type="checkbox" name="seller"
                                    class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-gray-900 checked:before:bg-gray-900 hover:before:opacity-10"
                                    id="description" />
                                <span
                                    class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20"
                                        fill="currentColor" stroke="currentColor" stroke-width="1">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </label>
                            <label class="mb-[1.4rem] font-light text-gray-700 cursor-pointer select-none"
                                htmlFor="description">
                                <div>
                                    <p
                                        class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                        I'm a seller
                                    </p>

                                </div>
                            </label>
                        </div>
                        
                        <div>
                            <label for="postal_code" class="block mb-2 text-sm font-medium text-gray-900 ">Postal code</label>
                            <input type="number" name="postal_code" id="postal_code" placeholder="40 000"
                                value="{{ old('postal_code') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                required>
                            @error('postal_code')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="country" class="block mb-2 text-sm font-medium text-gray-900 ">country</label>
                            <input type="text" name="country" id="country" placeholder="United stats of america"
                                value="{{ old('country') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                required>
                            @error('country')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="city" class="block mb-2 text-sm font-medium text-gray-900 ">city</label>
                            <input type="text" name="city" id="city" placeholder="City"
                                value="{{ old('city') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                required>
                            @error('city')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 ">address</label>
                            <input type="text" name="address" id="address" placeholder="Address"
                                value="{{ old('address') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                required>
                            @error('address')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                value="{{ old('password') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                required>
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 ">Confirm
                                password</label>
                            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"
                                id="confirm-password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                required>
                            @error('password_confirmation')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" aria-describedby="terms" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 focus:border-orange-700"
                                    required>
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-light text-gray-500 ">I accept the <a
                                        class="font-medium text-primary-600 hover:underline " href="#">Terms and
                                        Conditions</a></label>
                            </div>
                        </div>
                        <button type="submit" style="background-color: rgb(255, 149, 0);"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Create
                            an account</button>
                        <p class="text-sm font-light text-gray-500 ">
                            Already have an account? <a href="{{ route('login') }}"
                                class="font-medium text-primary-600 hover:underline ">Login here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
