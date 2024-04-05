@extends('layout.app')
@section('content')
    <section class="container mx-auto p-4 md:p-8 lg:pt-12 grid grid-rows-2">
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-green-900">User Profile</h1>
        <div class="flex flex-col md:flex-row items-center justify-around">
            <div class="flex pt-4 md:pt-0 md:pl-4">
                <div>
                    <div class="mb-4 md:mb-0"><img class="w-12 md:w-16 lg:w-20" src="{{ asset('images/14.jpg') }}"
                            alt="user">
                    </div>
                </div>
                <div class="flex flex-col justify-center px-4">
                    <span class="text-base md:text-lg">{{ $user->name }}</span>
                    <span class="text-gray-400">{{ $user->address }}, {{ $user->postal_code }}, {{ $user->country }}</span>
                </div>
            </div>
            <div class="flex space-x-2 md:space-x-4 mt-4 md:mt-0">
                <a class="w-1/2 md:w-[124px] px-2 md:px-4 bg-green-600 h-10 text-white rounded-md text-center leading-10"
                    href="./editProfile.html">Update</a>
                <a class="w-1/2 md:w-[124px] px-2 md:px-4 bg-red-600 h-10 text-white rounded-md text-center leading-10"
                    href="#">Delete</a>
            </div>
        </div>
    </section>
    <div class="border mt-4 w-[85%] mx-auto justify-center items-center text-center"></div>
    <section>
        <div class="w-full py-5">
            <div class="w-11/12 mx-auto py-5">
                <div class="flex justify-evenly">
                    <div>
                        <div class="flex flex-col p-2">
                            <span class="font-semibold mb-1">Name</span>
                            <span class="text-gray-400 pl-2">{{ $user->name }}</span>
                        </div>
                        <div class="flex flex-col p-2">
                            <span class="font-semibold mb-1">Address</span>
                            <span class="text-gray-400 pl-2">{{ $user->address }}</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-col p-2">
                            <span class="font-semibold mb-1">city/Country</span>
                            <span class="text-gray-400 pl-2">{{ $user->city }} / {{ $user->Country }}</span>
                        </div>
                        <div class="flex flex-col p-2">
                            <span class="font-semibold mb-1">User Email</span>
                            <span class="text-gray-400 pl-2">{{ $user->email }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="border mt-4 w-[85%] mx-auto justify-center items-center text-center"></div>
    <section>
        <div class="w-full py-5">
            <div class="w-11/12 mx-auto py-5 mr-[105px]">
                <div class="flex justify-evenly">
                    <div>
                        <div class="flex flex-col">
                            <span class="font-semibold mb-1">Password</span>
                            <span class="text-gray-400 pl-2">••••••••••••</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-col">
                            <span class="font-semibold mb-1">Phone Number</span>
                            <span class="text-gray-400 pl-2">+212 62563891</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="border  mt-4 w-[85%] mx-auto justify-center items-center text-center"></div>
    <div>
        <h2 class="text-2xl md:text-3xl mt-6 ml-[8rem] lg:text-4xl font-bold text-green-900">My Products</h2>
        <div class="flex flex-wrap">
            <div class="max-w-sm ml-[8rem] w-[35rem] lg:max-w-[42rem] lg:flex m-7">
                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                    style="background-image: url({{ asset('images/card-left.jpg') }})" title="Woman holding a mug">
                </div>
                <div
                    class="shadow-2xl border rounded-md bg-white rounded-b p-4 flex flex-col justify-between leading-normal">
                    <div class="mb-8">
                        <p class="text-sm text-gray-600 flex items-center">
                            <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                            </svg>
                            Members only
                        </p>
                        <div class="text-gray-900 font-bold text-xl mb-2">Can coffee make you a better developer?</div>
                        <p class="text-gray-700 text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
                    </div>
                    <div class="flex items-center">
                        <img class="w-10 h-10 rounded-full mr-4" src="{{ asset('images/14.jpg') }}" alt="Avatar of Jonathan Reinink">
                        <div class="text-sm">
                            <p class="text-gray-900 leading-none">Jonathan Reinink</p>
                            <p class="text-gray-600">Aug 18</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
