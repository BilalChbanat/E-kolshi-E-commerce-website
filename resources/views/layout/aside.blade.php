<div>
    <div class="flex flex-no-wrap h-full">
        <div style="min-height: 716px"
            class="w-64 absolute sm:relative bg-blue-100 shadow md:h-full flex-col justify-between hidden sm:flex">
            <div class="px-8">
                <div class="h-16 w-full flex items-center mt-[1rem]">
                    <a href="{{ route('/') }}">
                        <img src="{{ asset('./images/e-kolshi-logo-removebg-preview.png') }}" alt="E-kolshi">
                    </a>
                </div>
                <ul class="mt-12">
                    <li class="flex w-full justify-between text-gray-800 cursor-pointer items-center mb-6">
                        <a href="{{ route('dashboard.index') }}" class="flex items-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid"
                                width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                            </svg>
                            <span class="text-sm ml-2">Dashboard</span>
                        </a>

                    </li>
                    <li
                        class="flex w-full justify-between text-gray-800 hover:text-gray-500 cursor-pointer items-center mb-6">
                        <a href="{{ url('products') }}" class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle"
                                width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                                </path>
                            </svg>
                            <span class="text-sm ml-2">Products</span>
                        </a>
                        <div
                            class="py-1 px-3 bg-blue-400 rounded text-gray-800 flex items-center justify-center text-xs">
                            8
                        </div>
                    </li>

                    <li
                        class="flex w-full justify-between text-gray-800 hover:text-gray-500 cursor-pointer items-center mb-6">
                        <a href="{{ route('dashboard.categories.index') }}" class="flex items-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-compass"
                                width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                <circle cx="12" cy="12" r="9"></circle>
                            </svg>
                            <span class="text-sm ml-2">categories</span>
                        </a>
                        <div
                            class="py-1 px-3 bg-blue-400 rounded text-gray-800 flex items-center justify-center text-xs">
                            5</div>
                    </li>
                    <li
                        class="flex w-full justify-between text-gray-800 hover:text-gray-500 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-code"
                                width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <polyline points="7 8 3 12 7 16"></polyline>
                                <polyline points="17 8 21 12 17 16"></polyline>
                                <line x1="14" y1="4" x2="10" y2="20"></line>
                            </svg>
                            <span class="text-sm ml-2">users</span>
                        </a>
                    </li>
                    <li
                        class="flex w-full justify-between text-gray-800 hover:text-gray-500 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle"
                                width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                                </path>
                            </svg>
                            <span class="text-sm ml-2">Invoices</span>
                        </a>
                        <div
                            class="py-1 px-3 bg-blue-400 rounded text-gray-800 flex items-center justify-center text-xs">
                            25</div>
                    </li>
                    <li
                        class="flex w-full justify-between text-gray-800 hover:text-gray-500 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack"
                                width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <polyline points="12 4 4 8 12 12 20 8 12 4" />
                                <polyline points="4 12 12 16 20 12" />
                                <polyline points="4 16 12 20 20 16" />
                            </svg>
                            <span class="text-sm ml-2">Profile</span>
                        </a>
                    </li>
                    <li
                        class="flex w-full justify-between text-gray-800 hover:text-gray-500 cursor-pointer items-center">
                        <a href="javascript:void(0)" class="flex items-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings"
                                width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                            <span class="text-sm ml-2">Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="px-8 ">
                <ul class="w-full  text-gray-800 py-4">
                    <a href="" class="text-gray-800 flex justify-center items-center"
                        class="w-full focus:outline-none focus:ring-2 rounded focus:ring-gray-300 text-white flex justify-center items-center">
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        <span class="px-4 text-gray-800"> <b>Log Out</b> </span>

                    </a>
                </ul>
            </div>
        </div>

    </div>
</div>
