<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="">
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Blog by ISAIAS
                XAVIER (For Laraveldaily)</span>
        </a>
        --}}{{--<button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>--}}{{--
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="/" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent
                    md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="{{ route('about') }}"
                       class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent
                       md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500
                       dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                </li>
                <li>
                    <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent
                    transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white
                    dark:hover:text-white/80 dark:focus-visible:ring-white">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{ $slot ?? '' }}
@yield('content')


</body>
</html>--}}

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Blog by ISAIAS
                XAVIER (For Laraveldaily)</span>
        </a>
        {{--<button data-collapse-toggle="navbar-dropdown" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden
                hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400
                dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>--}}
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50
            md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800
            md:dark:bg-gray-900 dark:border-gray-700">
                @auth()
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                                class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded
                                hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700
                                md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white
                                dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                            Register
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                             class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44
                             dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="{{ route('article.create') }}"
                                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600
                                   dark:hover:text-white">Article</a>
                                </li>
                                <li>
                                    <a href="{{ route('category.create') }}"
                                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600
                                   dark:hover:text-white">Category</a>
                                </li>
                                <li>
                                    <a href="{{ route('tag.create') }}"
                                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600
                                   dark:hover:text-white">Tag</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endauth

                @auth()
                    <li>
                        <button id="dropdownNavbarLinkList" data-dropdown-toggle="dropdownNavbarList"
                                class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                            List
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbarList"
                             class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="#"
                                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600
               dark:hover:text-white">Articles</a>
                                </li>
                                <li>
                                    <a href="{{ route('category.index') }}"
                                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600
               dark:hover:text-white">Categories</a>
                                </li>
                                <li>
                                    <a href="{{ route('tag.index') }}"
                                       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600
               dark:hover:text-white">Tags</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endauth

                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50
                    md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800
                    md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="/" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent
                    md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}"
                               class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent
                       md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500
                       dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent
                    transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white
                    dark:hover:text-white/80 dark:focus-visible:ring-white">Login</a>
                        </li>

                    </ul>
                </div>
            </ul>
        </div>
    </div>
</nav>

{{ $slot ?? '' }}
@yield('content')
<footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800">
    <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
      <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
          © 2024 <a href="https://flowbite.com/" class="hover:underline">Isaias Xavier
          </a>. All Rights Reserved. (This blog was developed in response to the challenge presented by Laraveldaily)
    </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
            <li>
                <a href="https://github.com/isaiasxavier" class="hover:underline me-4 md:me-6">Personal Github</a>
            </li>
            <li>
                <a href="https://github.com/isaiasxavier/bglvlch" class="hover:underline me-4 md:me-6">Project
                    Github</a>
            </li>
        </ul>
    </div>
</footer>
<script src="{{ asset('js/flowbite.min.js') }}"></script>
</body>
</html>