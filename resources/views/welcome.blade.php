<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kolshi | Accueil</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <meta name="description" content="Free open source Tailwind CSS Store template">
    <meta name="keywords"
        content="tailwind,tailwindcss,tailwind css,css,starter template,free template,store template, shop layout, minimal, monochrome, minimalistic, theme, nordic">

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        .work-sans {
            font-family: 'Work Sans', sans-serif;
        }

        #menu-toggle:checked+#menu {
            display: block;
        }

        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }

        .hover\:grow:hover {
            transform: scale(1.02);
        }

        .carousel-open:checked+.carousel-item {
            position: static;
            opacity: 100;
        }

        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }

        #carousel-1:checked~.control-1,
        #carousel-2:checked~.control-2,
        #carousel-3:checked~.control-3 {
            display: block;
        }

        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }

        #carousel-1:checked~.control-1~.carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-2:checked~.control-2~.carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-3:checked~.control-3~.carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #000;
            /*Set to match the Tailwind colour you want the active one to be */
        }
    </style>

</head>

@extends('layout.app')
@section('content')

    <div class="carousel relative container mx-auto" style="max-width:100vw;">
        <div class="carousel-inner relative overflow-hidden w-full">
            <!--Slide 1-->
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden=""
                checked="checked">
            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                <video class="w-[100vw]" height="600" autoplay controls muted>
                    {{-- <source src="{{ asset('images/Digital Marketing Agency Video Ad - After Effects Template.mp4') }}" type="video/mp4"> --}}
                    <source src="{{ asset('images/Digital Marketing Agency Video Ad - After Effects Template.mp4') }}"
                        type="video/ogg">

                </video>
            </div>
            <label for="carousel-3"
                class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-2"
                class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!--Slide 2-->
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0 bg-cover bg-right" style="height:50vh;">
                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right"
                    style="background-image: url('https://images.unsplash.com/photo-1533090161767-e6ffed986c88?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjM0MTM2fQ&auto=format&fit=crop&w=1600&q=80');">

                    <div class="container mx-auto">
                        <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                            <p class="text-black text-2xl my-4">Real Bamboo Wall Clock</p>
                            <a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black"
                                href="#">view product</a>
                        </div>
                    </div>

                </div>
            </div>
            <label for="carousel-1"
                class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-3"
                class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!--Slide 3-->
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-bottom"
                    style="background-image: url('https://images.unsplash.com/photo-1519327232521-1ea2c736d34d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1600&q=80');">

                    <div class="container mx-auto">
                        <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                            <p class="text-black text-2xl my-4">Brown and blue hardbound book</p>
                            <a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black"
                                href="#">view product</a>
                        </div>
                    </div>

                </div>
            </div>
            <label for="carousel-2"
                class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-1"
                class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>
            <!-- Add additional indicators for each slide-->
            <ol class="carousel-indicators">
                <li class="inline-block mr-3">
                    <label for="carousel-1"
                        class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-2"
                        class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-3"
                        class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
            </ol>
        </div>
    </div>
    <!--carousal-->
    <div class="bg-white">
        <div class="mx-auto  px-4 py-16 sm:px-6 sm:py-24  lg:px-8 w-[90vw]">
            <h2 class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl pb-8">Our
                popular prodcts</h2>
            <div
                class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8 owl-carousel owl-theme">
                @foreach ($products as $item)
                    <a href="{{ url('products/' . $item->id . '/detail') }}" class="item group">
                        <div
                            class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                            <img src="{{ asset($item->image) }}" alt="Our products">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">{{ $item->title }}</h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">{{ $item->price }} MAD</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <!--carousal end-->
    <div class="w-[90vw] flex flex-col ml-[4.4rem]" data-aos="zoom-in">
        <div
            class="bg-gradient-to-br from-orange-600 to-yellow-600 text-white text-center py-10 px-20 rounded-lg shadow-md relative">
            {{-- <img src="https://i.postimg.cc/KvTqpZq9/uber.png" class="w-20 mx-auto mb-4 rounded-lg"> --}}
            <h3 class="text-2xl font-semibold mb-4">20% flat off on your first buy <br>using HDFC Credit Card
            </h3>
            <div class="flex items-center space-x-2 mb-6">
                <span id="cpnCode" class="border-dashed border text-white px-4 py-2 rounded-l">STEALDEAL20</span>
                <span id="cpnBtn"
                    class="border border-white bg-white text-purple-600 px-4 py-2 rounded-r cursor-pointer">Copy
                    Code</span>
            </div>
            <p class="text-sm">Valid Till: 20Dec, 2024</p>

            <div class="w-12 h-12 bg-white rounded-full absolute top-1/2 transform -translate-y-1/2 left-0 -ml-6"></div>
            <div class="w-12 h-12 bg-white rounded-full absolute top-1/2 transform -translate-y-1/2 right-0 -mr-6"></div>

        </div>
    </div>
    {{-- end promo --}}
    <section class="bg-white py-8">

        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
                        href="#">
                        Store
                    </a>

                    <div class="flex w-full justify-center items-center">
                        {{-- Search  --}}
                        {{-- <div class="w-[30rem]  bg-gray-900 mt-7">
                            <label for="default-search"
                                class="mb-2 text-sm font-medium  sr-only text-white">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4  text-gray-400 px-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="search" id="search"
                                    class="block w-full p-4 ps-10 text-sm  border  rounded-lg bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Search Mockups, Logos..." required />
                                <button type="submit"
                                    class="text-white absolute end-2.5 bottom-2.5  focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Search</button>
                            </div>
                        </div> --}}
                        {{-- ------------------------------- --}}
                        <div class="relative flex border w-2/6 rounded-md" data-twe-input-wrapper-init data-twe-input-group-ref>
                            <input type="search" id="search"
                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.5rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none  [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                                placeholder="Search Mockups, Logos..." aria-label="Search" id="search-focus"
                                aria-describedby="basic-addon4" />
                            <label for="search-focus"
                                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none ">Search
                            </label>
                            <button
                                class="relative z-[2] -ms-0.5 flex items-center rounded-e bg-primary px-5  text-xs font-medium uppercase leading-normal text-black shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 "
                                type="button" id="button-addon4" data-twe-ripple-init data-twe-ripple-color="light">
                                <span class="[&>svg]:h-5 [&>svg]:w-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                        {{-- ------------------------------- --}}
                        {{-- end Search --}}
                        {{-- filter --}}
                        <div class=" ml-4 ">
                            <div class="hs-dropdown relative inline-flex">
                                <button id="hs-dropdown-basic" type="button"
                                    class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-gray-900 text-gray-300 shadow-sm hover:bg-gray-8000 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                    Filter <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z"/></svg>
                                    <svg class="hs-dropdown-open:rotate-180 size-4 text-gray-600"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </button>

                                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-56 hidden z-10 mt-2 min-w-60 shadow-md rounded-lg p-2 bg-gray-800 dark:border border-gray-700 divide-gray-700"
                                    aria-labelledby="hs-dropdown-basic">
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-300 hover:bg-gray-800 focus:outline-none  hover:text-gray-300 focus:bg-gray-700"
                                        href="{{ route('/') }}">
                                        All
                                    </a>
                                    @foreach ($categories as $item)
                                        <a class="{{ $selectedCategory == $item->id ? 'font-bold' : '' }} flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-300 hover:bg-gray-800 focus:outline-none hover:text-gray-300 focus:bg-gray-700"
                                            href="{{ url('/products/filter?category=' . $item->id) }}">
                                            {{ $item->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="container mx-auto flex justify-center items-center flex-wrap pt-4 pb-12" id="place_result">
                @foreach ($products as $item)
                    <div class="w-[28rem] h-[25rem] p-6 flex flex-col" data-aos="zoom-out">
                        <a class="w-full h-full" href="{{ url('products/' . $item->id . '/detail') }}">
                            <img class="hover:grow hover:shadow-lg w-full h-[20rem]" src="{{ asset($item->image) }}">
                        </a>
                        <div class="pt-3 flex items-center justify-between">
                            <p class="">{{ $item->title }}</p>
                            <div class="flex">
                                <a href="{{ route('cart.add', $item->id) }}" class="px-4">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" width="18px"
                                        height="18px" viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M21 5L19 12H7.37671M20 16H8L6 3H3M16 5.5H13.5M13.5 5.5H11M13.5 5.5V8M13.5 5.5V3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z"
                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <a href="{{ route('wishlist.add', $item->id) }}">
                                    <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path
                                            d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                                    </svg>
                                </a>


                            </div>
                        </div>
                        <p class="pt-1 text-gray-900">{{ $item->price }} MAD</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            autoplay: true,
            autoplayTimeout: 900,
            autoplayHoverPause: true,
            dots: false,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
    <script>
        AOS.init();
    </script>
    <script>
        // Initialization for ES Users
        import {
            Ripple,
            Input,
            initTWE,
        } from "tw-elements";

        initTWE({
            Ripple,
            Input
        });

        const searchFocus = document.getElementById('search-focus');
        const keys = [{
                keyCode: 'AltLeft',
                isTriggered: false
            },
            {
                keyCode: 'ControlLeft',
                isTriggered: false
            },
        ];

        window.addEventListener('keydown', (e) => {
            keys.forEach((obj) => {
                if (obj.keyCode === e.code) {
                    obj.isTriggered = true;
                }
            });

            const shortcutTriggered = keys.filter((obj) => obj.isTriggered).length === keys.length;

            if (shortcutTriggered) {
                searchFocus.focus();
            }
        });

        window.addEventListener('keyup', (e) => {
            keys.forEach((obj) => {
                if (obj.keyCode === e.code) {
                    obj.isTriggered = false;
                }
            });
        });
    </script>
@endsection
@section('title', 'Home')
