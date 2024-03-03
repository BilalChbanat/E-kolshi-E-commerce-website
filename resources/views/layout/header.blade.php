<header class="text-gray-600 body-font">
    <div class="py-[12px] bg-[#1E1F29] flex">
        <div class="w-[100vw] px-[15px] text-gray-300 ">
            <ul class="float-left flex ">
                <li class="mr-[15px] text-[12px]"><a href="#"><i class="fa fa-phone"></i> +212-7</a></li>
                <li class="mr-[15px] text-[12px]"><a href="#"><i class="fa fa-envelope-o"></i>
                        e-kolshi@support.com</a></li>
                <li class="mr-[15px] text-[12px]"><a href="#"><i class="fa fa-map-marker"></i> Stonecoal 1734
                        Road</a></li>
            </ul>
            <ul class="float-right flex ">
                <li class="mr-[15px] text-[12px]"><a href="#"><i class="fa fa-dollar"></i>Coin</a></li>
                <li class="mr-[15px] text-[12px]"><a href="#"><i class="fa fa-user-o"></i> USD $</a></li>
            </ul>
        </div>
    </div>
    <div class="container mx-auto flex flex-wrap py-5 pl-5 flex-col md:flex-row items-center">
        <a href="{{route('/')}}" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <img class="w-[10em]" src="{{ asset('images/logo.png') }}" alt="E-kolshi Logo">
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center px-3">
            <a class="mr-5 cursor-pointer hover:text-orange-700">Store</a>
            <a class="mr-5 cursor-pointer hover:text-orange-700">About Us</a>
            <a class="mr-5 cursor-pointer hover:text-orange-700">Contact us</a>

        </nav>
        @auth
            
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
        @else
            <div class="flex items-center justify-end gap-3">
                <a class="hidden items-center justify-center rounded-xl bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 transition-all duration-150 hover:bg-gray-50 sm:inline-flex"
                    href="{{ route('register') }}">Sign up</a>
                <a class="inline-flex items-center justify-center rounded-xl bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm transition-all duration-150 hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600"
                    href="{{ route('login') }}">Login</a>
            </div>

        @endauth

        <div class="flex">
            <div class="pl-4 pb-2 flex justify-center items-center">
                <a href="#" class="relative py-2">
                    <div class="t-0 absolute left-3">
                        <p
                            class="flex h-2 w-2 items-center justify-center rounded-full bg-red-500 p-3 text-xs text-white mb-4">
                            3
                        </p>
                    </div>
                    <?xml version="1.0" encoding="iso-8859-1"?>
                    <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                    <svg fill="#000000" height="28px" width="28px" version="1.1" id="Capa_1" class="mt-[0.7rem]"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 471.701 471.701" xml:space="preserve">
                        <g>
                            <path d="M433.601,67.001c-24.7-24.7-57.4-38.2-92.3-38.2s-67.7,13.6-92.4,38.3l-12.9,12.9l-13.1-13.1
  c-24.7-24.7-57.6-38.4-92.5-38.4c-34.8,0-67.6,13.6-92.2,38.2c-24.7,24.7-38.3,57.5-38.2,92.4c0,34.9,13.7,67.6,38.4,92.3
  l187.8,187.8c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-3.9l188.2-187.5c24.7-24.7,38.3-57.5,38.3-92.4
  C471.801,124.501,458.301,91.701,433.601,67.001z M414.401,232.701l-178.7,178l-178.3-178.3c-19.6-19.6-30.4-45.6-30.4-73.3
  s10.7-53.7,30.3-73.2c19.5-19.5,45.5-30.3,73.1-30.3c27.7,0,53.8,10.8,73.4,30.4l22.6,22.6c5.3,5.3,13.8,5.3,19.1,0l22.4-22.4
  c19.6-19.6,45.7-30.4,73.3-30.4c27.6,0,53.6,10.8,73.2,30.3c19.6,19.6,30.3,45.6,30.3,73.3
  C444.801,187.101,434.001,213.101,414.401,232.701z" />
                        </g>
                    </svg>
                </a>
            </div>
            <div class="pl-4 pb-2 flex justify-center items-center">
                <a href="#" class="relative py-2">
                    <div class="t-0 absolute left-3">
                        <p
                            class="flex h-2 w-2 items-center justify-center rounded-full bg-red-500 p-3 text-xs text-white">
                            3
                        </p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="file: mt-4 h-[28px] w-[28px]">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </a>
            </div>
        </div>

    </div>
</header>
