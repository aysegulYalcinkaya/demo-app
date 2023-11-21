@extends('layouts.layout')
@section('content')
    <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin=''/>
    <div class="mx-auto max-w-6xl py-0 lg:py-6 sm:w-screen">
        <div class="bg-white lg:mx-6">
            <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
                 aria-hidden="true">
            </div>
            @if ($place)

                <div class="lg:flex flex-row">

                <div class="lg:w-2/3 lg:pr-6 lg:mt-5">
                <div><img class="" src="{{ $place->images }}" alt="{{ $place->establishment }}"></div>
                </div>
                    <div>
            <div class="mx-3">
                <div>
                    <h1 style="color:#ED3163" class="text-3xl lg:text-4xl font-black mb-1 mt-3 lg:mt-9 lg:mb-2">{{ $place->establishment }}</h1>

                    <div class="flex flex-row">
                    <div>
                      <?php
                        if ($place->type == "Bakery")
                            echo "<img class='h-5 w-5 mr-1' src='https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/68ed943a-5fea-46db-0272-2e83c311e800/public'>";
                        elseif ($place->type == "Pub" || $place->type == "Brewery" || $place->type == "Brewpub")
                            echo "<img class='h-5 w-5 mr-1' src='https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/78465440-ad70-42ca-8bc4-99bb5bda3f00/public '>";
                        elseif ($place->type == "Cafe" || $place->type == "Coffee shop")
                            echo "<img class='h-5 w-5 mr-1' src='https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/de8ab959-7209-4b6c-32f0-631788d18800/public '>";
                        elseif ($place->type == "Restaurant" || $place->type == "Bar" || $place->type == "Bar & grill")
                            echo "<img class='h-5 w-5 mr-1' src='https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/38dc7473-0d3f-424c-222e-f615ae75dd00/public '>";
                        ?>
                    </div>

                    <div><p class="text-sm mb-3 lg:mb-6" style="color:#001F68">{{ $place->defined_type }}</p></div>
            </div>

                </div>

                @if ($place->dog_friendly_score)
                <div class="flex flex-row mt-8 lg:mt-4">
                    <div class="mr-4"><img class="h-7 w-7"
                                           src="https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/a2e14e43-30e0-4dbf-6750-24ed33596200/public">
                    </div>
                    <div><p class="text-sm mt-1 font-light">{{ $place->dog_friendly_score }}/5 dog-friendly
                            score</p></div>
                </div>
                @endif

                <div class="flex flex-row mt-4">

                    <div class="mr-4"><img class="h-7 w-7"
                                           src="https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/7db77dda-0d38-4267-eb77-cfda0f79a000/public">
                    </div>
                    <div>
                        <p class="text-sm mt-1 font-light">{{ $place->inside?"Dogs can go inside!":"Dogs allowed on the outside patio!" }}</p>
                    </div>
                </div>

                @if (($place->address || $place->city || $place->postal_code))
                <div class="flex flex-row mt-4">
                    <div class="mr-4"><img class="h-7 w-7"
                                           src="https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/39650238-5ead-4c7f-6305-64d01d35f000/public">
                    </div>
                    <div><p class="text-sm mt-1 font-light">{{ $place->address }}, {{ $place->city }}, {{ $place->postal_code }}</p></div>
                </div>
                @endif
                @if ($place->website)
                <div class="flex flex-row mt-4">
                    <div class="mr-4"><img class="h-7 w-7"
                                           src="https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/bb6fadd0-e6fb-49f4-94b6-13a0a1e95800/public">
                    </div>
                    <div><p class="text-sm mt-1 font-light"><a href="http://{{ $place->website }}"
                                                               target="_blank">{{ $place->website }}</a></p>
                    </div>
                </div>
                @endif

                @if ($place->instagram)
                <div class="flex flex-row mt-4">
                    <div class="mr-4"><img class="h-7 w-7"
                                           src="https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/e7da3bda-de38-48d0-b6a6-b17fc997d100/public">
                    </div>
                    <div><p class="text-sm mt-1 font-light"><a
                                    href="https://www.instagram.com/{{ $place->instagram }}"
                                    target="_blank">{{ $place->instagram }}</a></p></div>
                </div>
                @endif

                <img class="mt-10 mb-8"
                     src="https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/5e520c49-e059-4036-1d02-ff80cf2c4900/public">
            </div>
                    </div></div>

                <div class="mx-3 lg:mx-0">
                    @if ($place->about)
                    <div class="lg:w-2/3">
                        <h3 class="font-bold lg:mt-9 text-2xl">What we think...</h3>

                        <p class="text-sm font-light mt-2 mb-9">{{ $place->about }}</p>
                    </div>
                    @endif
                <div id="map" class="w-full h-60 lg:h-80"></div>
                <div id="reviews" class="mt-3">
                    <h3 class="font-bold mt-6 lg:mt-9 mb-3 text-2xl">Reviews</h3>
                    @if (count($reviews)>0)
                        @foreach($reviews as $review)
                            <div>
                                <p class="text-sm font-black mt-2">{{ $review->name }}</p>
                                <p class="text-sm font-black mt-2">{{ \Carbon\Carbon::parse($review->created_at)->format('d M Y h:i a')}}</p>
                                <p class="text-sm mt-2 mb-3">{{ $review->review }}</p>
                                <hr>
                            </div>
                        @endforeach
                    @else
                        <p class="text-sm">No reviews yet...</p>
                    @endif
                </div>

                <div><h3 class="font-bold mt-9 mb-3 lg:mb-6 lg:mt-10">Tell us about {{ $place->establishment }}</h3></div>
                <form class="container mt-2" method="post" action="{{ url('location/save_review') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="place_id" value={{ $place->id }}>
                    <input type="hidden" name="establishment" value={{ $place->establishment }}>

                    <div class="lg:flex flex-row">
                        <div class="lg:mr-10 lg:w-1/2">
                    <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 mb-6 mt-2 lg:mt-0 text-gray-700 text-sm leading-tight focus:outline-none focus:shadow-outline"
                            name="name" type="text" placeholder="Your name...">
                        </div>
                        <div class="lg:w-1/2">
                    <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 mb-6 text-gray-700 text-sm leading-tight focus:outline-none focus:shadow-outline"
                            name="email" type="text" placeholder="Email (optional)...">
                        </div>
                    </div>
                    <textarea
                            class="shadow appearance-none border rounded w-full py-2 px-3 mb-6 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="review" rows="5">
                        </textarea>
                    <div class="w-full flex">
                        <button name="submit"
                                style="background-color: #ED3163;" class="ml-auto mr-0 text-white text-sm font-bold hover:text-white py-2 px-4 hover:border-transparent rounded-3xl h-12 w-full lg:w-40 mb-10">
                            Submit review
                        </button>
                    </div>
                </form>
            </div>

            </div>
        </div>










            @else
                <div>Location not found</div>
            @endif


        </div>
    </div>

    <script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
    <script>
        let map, markers = [];

        /* ----------------------------- Initialize Map ----------------------------- */
        function initMap() {
            const initialMarkers = <?php echo json_encode($initialMarkers); ?>;
            const data = initialMarkers[0];
            map = L.map('map', {
                center: {
                    lat: data.position.lat,
                    lng: data.position.lng,
                },
                zoom: 15
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap'
            }).addTo(map);

            initMarkers();
        }

        if (<?php echo json_encode($initialMarkers); ?> !==
        null
        )
        initMap();

        /* --------------------------- Initialize Markers --------------------------- */
        function initMarkers() {
            const initialMarkers = <?php echo json_encode($initialMarkers); ?>;

            for (let index = 0; index < initialMarkers.length; index++) {

                const data = initialMarkers[index];
                const marker = generateMarker(data, index);
                marker.addTo(map).bindPopup(`<b>${data.position.lat},  ${data.position.lng}</b>`);
                map.panTo(data.position);
                markers.push(marker)
            }
        }

        function generateMarker(data, index) {

            return L.marker(data.position, {
                draggable: data.draggable,

            })
        }


    </script>
@endsection
