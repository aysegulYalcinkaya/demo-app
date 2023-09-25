<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5WD7JC3JST"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-5WD7JC3JST');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawsList - dog friendly venues in Toronto.</title>
    <meta name="description" content="
  PawsList is the ultimate guide for dog friendly places in Toronto.">
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/3307/3307778.png">
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <style>
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            min-width: 10rem;
            padding: 0.5rem 0;
            margin: 0.125rem 0 0;
            text-align: left;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 5px;

        }

        .dropdown-item {
            display: block;
            width: 100%;
            padding: 0.25rem 1.5rem;
            clear: both;
            font-weight: 400;
            color: #212529;
            text-align: inherit;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
        }
    </style>
</head>
<body>


<nav class="bg-white">
    <div class="mx-auto max-w-7xl px-4 px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8"
                         src="https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/ddd33672-1079-4694-2dba-486b53b2b700/public"
                         alt="PawsList">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="/"
                           class="{{ request()->is('/') ? 'bg-gray-900 text-white' : 'text-black' }} hover:bg-white hover:text-gray-500 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="/places"
                           class="{{ request()->is('/places') ? 'bg-gray-900 text-black' : 'text-black' }} hover:bg-white hover:text-gray-500 px-3 py-2 rounded-md text-sm font-medium">All
                            Places</a>
                        <a href="/pubs"
                           class="{{ request()->is('/pubs') ? 'bg-gray-900 text-black' : 'text-black' }} hover:bg-white hover:text-gray-500 px-3 py-2 rounded-md text-sm font-medium">Pubs
                            & Breweries</a>
                        <a href="/cafes"
                           class="{{ request()->is('/cafes') ? 'bg-gray-900 text-black' : 'text-black' }} hover:bg-white hover:text-gray-500 px-3 py-2 rounded-md text-sm font-medium">Cafes
                            & Coffee Shops</a>
                        @auth
                            <a href="/comments"
                               class="{{ request()->is('/comments') ? 'bg-gray-900 text-black' : 'text-black' }} hover:bg-white hover:text-gray-500 px-3 py-2 rounded-md text-sm font-medium">My
                                Reviews</a>
                        @endauth
                        <a href="/restaurants"
                           class="{{ request()->is('/restaurants') ? 'bg-gray-900 text-black' : 'text-black' }} hover:bg-white hover:text-gray-500 px-3 py-2 rounded-md text-sm font-medium">Restaurants
                            & Bars</a>
                        <a href="/indoors"
                           class="{{ request()->is('/indoors') ? 'bg-gray-900 text-red-500' : 'text-red-500' }} hover:bg-white hover:text-gray-500 px-3 py-2 rounded-md text-sm font-medium">Paws
                            Indoors</a>
                    </div>
                </div>

            </div>

            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" id="mobile-menu-button"
                        class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-600 hover:bg-white hover:text-black focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                        aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
                      Heroicon name: outline/bars-3

                      Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                    <!--
                      Heroicon name: outline/x-mark

                      Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <!-- Profile dropdown -->
                    @auth
                        <div class="relative ml-3">
                            <button type="button"
                                    class="flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>

                                <img class="h-8 w-8 rounded-full"
                                     src="https://cdn-icons-png.flaticon.com/512/3307/3307778.png"
                                     alt="">
                            </button>
                        </div>

                        <div class="ml-3">
                            <form method="POST" action="/logout">
                                <input type="hidden" name="_method" value="GET"/>

                                <button class="text-black text-sm">Log Out</button>
                            </form>
                        </div>
                    @endauth
                    @guest
                        <div class="ml-3">
                            <a href="/register"
                               class="{{ request()->is('/register') ? 'bg-gray-900 text-black' : 'text-black' }} hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"></a>
                            <a href="/login"
                               class="{{ request()->is('/login') ? 'bg-gray-900 text-black' : 'text-black' }} hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"></a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>

    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="/" class="bg-white text-black block px-3 py-2 rounded-md text-base font-medium"
               aria-current="page">Home</a>

            <a href="/places"
               class="text-black hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">All
                places</a>

            <a href="/pubs"
               class="text-black hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Pubs
                & Breweries</a>

            <a href="/cafes"
               class="text-black hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Cafes
                & Coffee shops</a>

            <a href="/restaurants"
               class="text-black hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Bars
                & Restaurants</a>
        </div>
    </div>
</nav>

<div class="content d-flex justify-content-center">
    @yield('content')
</div>
<footer>
    <div class="bg-white border-t-2 border-black mt-6">
        <div class="h-auto mt-0 mb-6 mx-auto max-w-7xl px-4 sm:px-6 lg:px-20 sm:pb-20 sm:pt-12 lg:pl-20">
            <h3 class="lg:text-xl sm:text-5xl md:text-5xl sm:mb-6 md:mb-6 lg:mb-2">Explore PawsList</h3>
            <div class="flex flex-row grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
                <div class="mt-6">
                    <h2 class="lg:text-sm sm:text-3xl font-bold">Downtown Toronto</h2>
                    <ul class="lg:text-sm sm:text-3xl text-gray-500 mt-2">
                        <li><a href="/pubs/downtown">Pubs & Breweries</a></li>
                        <li>Cafe & Coffee shops</li>
                        <li>Restaurants & Bars</li>
                    </ul>
                </div>
                <div class="mt-6">
                    <h2 class="lg:text-sm sm:text-3xl font-bold">East Toronto</h2>
                    <ul class="lg:text-sm sm:text-3xl text-gray-500 mt-2">
                        <li>Pubs & Breweries</li>
                        <li>Cafe & Coffee shops</li>
                        <li>Restaurants & Bars</li>
                    </ul>
                </div>
                <div class="mt-6">
                    <h2 class="lg:text-sm sm:text-3xl font-bold">North Toronto</h2>
                    <ul class="lg:text-sm sm:text-3xl text-gray-500 mt-2">
                        <li>Pubs & Breweries</li>
                        <li>Cafe & Coffee shops</li>
                        <li>Restaurants & Bars</li>
                    </ul>
                </div>
                <div class="mt-6">
                    <h2 class="lg:text-sm sm:text-3xl font-bold">West Toronto</h2>
                    <ul class="lg:text-sm sm:text-3xl text-gray-500 mt-2">
                        <li>Pubs & Breweries</li>
                        <li>Cafe & Coffee shops</li>
                        <li>Restaurants & Bars</li>
                    </ul>
                </div>
                <div class="mt-6">
                    <h2 class="lg:text-sm sm:text-3xl font-bold">Midtown Toronto</h2>
                    <ul class="lg:text-sm sm:text-3xl text-gray-500 mt-2">
                        <li>Pubs & Breweries</li>
                        <li>Cafe & Coffee shops</li>
                        <li>Restaurants & Bars</li>
                    </ul>
                </div>
                <div class="mt-6">
                    <h2 class="lg:text-sm sm:text-3xl font-bold">Other stuff</h2>
                    <ul class="lg:text-sm sm:text-3xl text-gray-500 mt-2 mb-20">
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
                <!-- Columns -->
            </div>

        </div>
    </div>

</footer>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const mobileMenuButton = document.querySelector("#mobile-menu-button");
        const mobileMenu = document.querySelector("#mobile-menu");

        mobileMenuButton.addEventListener("click", function () {
            mobileMenu.classList.toggle("hidden");
        });
    });
</script>
</body>
</html>
