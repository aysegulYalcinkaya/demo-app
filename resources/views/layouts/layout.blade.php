<!doctype html>
<html lang="en" class="h-full bg-white">
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
    <title>Dog-Friendly Venues In Toronto | Paws List</title>
    <meta name="description" content="
  Paws List is the ultimate guide for dog-friendly pubs, restaurants, coffee shops, and cafes in Toronto.">
    <link rel="icon" type="image/x-icon" href="https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/d63cfeb0-c9a1-494b-2e68-99d7b67b2100/public">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
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

        p, h2, h3, li {
            color:#001F68;
        }


    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'poppins': ['Poppins'],
                    }
                }
            }
        }
    </script>
</head>
<body class="font-poppins">


<nav class="bg-white border-b-2 border-black">
    <div class="mx-auto max-w-7xl px-0 lg:px-0">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="/"><img class="h-14 mt-1 ml-2 lg:mr-10"
                                     src="https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/e36b530e-af68-4ade-0bf0-4f26b6bf9200/public"
                                     alt="Paws List"></a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-52 flex items-baseline space-x-4">
                        <div class="flex flex-row mt-6">
                            <div><img src="https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/e38211a5-7e12-42c9-c40c-2a76692f2000/public" alt="All dog-friendly places in Toronto" class="h-5 w-5"></div>
                            <div><a href="/places"
                                    class="{{ request()->is('/places') ? 'bg-gray-900 text-blue-900' : 'text-blue-900' }} hover:bg-white hover:text-gray-500 px-2 py-2 rounded-md text-xs font-normal ">All
                                    Places</a></div>
                        </div>

                        <div class="flex flex-row mt-6">
                            <div><img src="https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/78465440-ad70-42ca-8bc4-99bb5bda3f00/public" alt="Dog-friendly pubs and breweries in Toronto" class="h-5 w-5"></div>
                            <div><a href="/pubs"
                                    class="{{ request()->is('/pubs') ? 'bg-gray-900 text-blue-900' : 'text-blue-900' }} hover:bg-white hover:text-gray-500 px-2 py-2 rounded-md text-xs font-normal">Pubs & Breweries</a></div>
                        </div>

                        <div class="flex flex-row mt-6">
                            <div><img src="https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/de8ab959-7209-4b6c-32f0-631788d18800/public" alt="Dog-friendly cafes and coffee shops in Toronto" class="h-5 w-5"></div>
                            <div><a href="/cafes"
                                    class="{{ request()->is('/cafes') ? 'bg-gray-900 text-blue-900' : 'text-blue-900' }} hover:bg-white hover:text-gray-500 px-2 py-2 rounded-md text-xs font-normal">Cafes & Coffee shops</a></div>
                        </div>

                        @auth
                            <a href="/comments"
                               class="{{ request()->is('/comments') ? 'bg-gray-900 text-blue-900' : 'text-blue-900' }} hover:bg-white hover:text-gray-500 px-2 py-2 rounded-md text-xs font-light">My
                                Reviews</a>
                        @endauth

                        <div class="flex flex-row mt-6">
                            <div><img src="https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/38dc7473-0d3f-424c-222e-f615ae75dd00/public" alt="Dog-friendly restaurants and bars in Toronto" class="h-5 w-5"></div>
                            <div><a href="/restaurants"
                                    class="{{ request()->is('/restaurants') ? 'bg-gray-900 text-blue-900' : 'text-blue-900' }} hover:bg-white hover:text-gray-500 px-2 py-2 rounded-md text-xs font-normal">Restaurants & Bars</a></div>
                        </div>

                        <div class="flex flex-row mt-6">
                            <div><img src="https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/c2cfa092-78bb-4022-9f0f-2ac2391e0c00/public" alt="Places in Toronto that allow dogs indoors" class="h-5 w-5"></div>
                            <div><a href="/indoors"
                                    class="{{ request()->is('/indoors') ? 'bg-gray-900 text-pink-600' : 'text-pink-600' }} hover:bg-white hover:text-gray-500 px-2 py-2 rounded-md text-xs font-normal">Paws Indoors</a></div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="-mr-0 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" id="mobile-menu-button"
                        class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-600 hover:bg-white hover:text-black focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                        aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
                      Heroicon name: outline/bars-3

                      Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none"
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

                </div>
            </div>
        </div>

    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="/places"
               class="text-black block px-3 py-2 rounded-md text-base font-medium">All
                Places</a>

            <a href="/pubs"
               class="text-black block px-3 py-2 rounded-md text-base font-medium">Pubs
                & Breweries</a>

            <a href="/cafes"
               class="text-black block px-3 py-2 rounded-md text-base font-medium">Cafes
                & Coffee shops</a>

            <a href="/restaurants"
               class="text-black block px-3 py-2 rounded-md text-base font-medium">Bars
                & Restaurants</a>
            <a href="/indoors"
               class="text-black block px-3 py-2 pb-6 rounded-md text-base font-medium">Paws Indoors</a>

            <hr class="h-px mx-4 bg-gray-200 border-0 dark:bg-gray-700">

            <a href="/contact"
               class="text-black block px-3 py-2 pt-6 rounded-md text-base font-medium">Contact</a>
            <a href="/about"
               class="text-black block px-3 py-2 rounded-md text-base font-medium">About Paws List</a>
        </div>
    </div>
</nav>

<div class="content d-flex justify-content-center">
    @yield('content')
</div>
<footer>
    <div class="bg-white border-t-2 border-black mt-10">
        <div class="h-auto mt-0 mb-6 mx-auto max-w-7xl px-4 sm:px-6 lg:px-20 sm:pb-20 sm:pt-12 lg:pl-20">
            <h3 style="color:#ED3163;" class="text-2xl font-bold mt-6 lg:mt-2">Explore Paws List</h3>
            <div class="flex flex-row grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
                <div class="mt-6">
                    <h2 class="text-base font-bold"><a href="/places/search?search=&neighbourhood=Down+Town">Downtown Toronto</a></h2>
                    <ul class="text-sm text-gray-500 mt-2 leading-7">
                        <li><a href="/pubs/downtown">Pubs & Breweries</a></li>
                        <li>Cafe & Coffee shops</li>
                        <li>Restaurants & Bars</li>
                    </ul>
                </div>
                <div class="mt-6">
                    <h2 class="text-base font-bold"><a href="/places/search?search=&neighbourhood=East+End">East Toronto</a></h2>
                    <ul class="text-sm text-gray-500 mt-2 leading-7">
                        <li>Pubs & Breweries</li>
                        <li>Cafe & Coffee shops</li>
                        <li>Restaurants & Bars</li>
                    </ul>
                </div>
                <div class="mt-6">
                    <h2 class="text-base font-bold"><a href="/places/search?search=&neighbourhood=North+York">North Toronto</a></h2>
                    <ul class="text-sm text-gray-500 mt-2 leading-7">
                        <li>Pubs & Breweries</li>
                        <li>Cafe & Coffee shops</li>
                        <li>Restaurants & Bars</li>
                    </ul>
                </div>
                <div class="mt-6">
                    <h2 class="text-base font-bold"><a href="/places/search?search=&neighbourhood=West+End">West Toronto</a></h2>
                    <ul class="text-sm text-gray-500 mt-2 leading-7">
                        <li>Pubs & Breweries</li>
                        <li>Cafe & Coffee shops</li>
                        <li>Restaurants & Bars</li>
                    </ul>
                </div>
                <div class="mt-6">
                    <h2 class="text-base font-bold"><a href="/places/search?search=&neighbourhood=Mid+Town">Midtown Toronto</a></h2>
                    <ul class="text-sm text-gray-500 mt-2 leading-7">
                        <li>Pubs & Breweries</li>
                        <li>Cafe & Coffee shops</li>
                        <li>Restaurants & Bars</li>
                    </ul>
                </div>
                <div class="mt-6">
                    <h2 class="text-base font-bold">Other Stuff</h2>
                    <ul class="text-sm text-gray-500 mt-2 mb-20 leading-7">
                        <li><a href="/contact">Contact</a></li>
                        <li><a href="/about">About</a></li>
                    </ul>


                </div>

            </div>
<hr/>
            <a href="https://www.instagram.com/paws.list" target="_blank"><img class="ml-0 mt-6 h-6 w-6" src="https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/10c4691c-becf-451c-e7e2-b065d485e100/public"</a>
            <p class="mt-3 pb-6 lg:pb-0 text-xs">© Paws List 2023. All rights reserved.</p>
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
