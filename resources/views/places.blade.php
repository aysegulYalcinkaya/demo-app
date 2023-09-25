@extends('layouts.layout')
@section('content')

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="bg-white">
                <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-10 lg:max-w-7xl lg:px-8">
                    <form action="{{ route('places.search') }}" method="GET">
                        @component('components.searchform',['neighbourhoods' => $neighbourhoods])

                            @slot('search')
                                {{ isset($search)?$search:"" }}
                            @endslot
                            @slot('selected_neighbourhood')
                                {{ isset($selected_neighbourhood)?$selected_neighbourhood:"" }}
                            @endslot
                            @slot('indoor')
                                {{ isset($indoor)?$indoor:"0" }}
                            @endslot
                        @endcomponent
                    </form>
                </div>
                <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-10 lg:max-w-7xl lg:px-8">
                    <h2 class="text-2xl font-normal tracking-tight text-gray-900">Dog
                        friendly places in Toronto</h2>
                    <p class="text-sm text-gray-500 mt-2">Each place on this page
                        welcomes dogs in their outdoor patio/garden.</p>
                    <p class="text-sm text-gray-500 mt-2"> Want to see where allows dogs
                        inside? <a href="/indoors" class="text-red-500">Click here</a>.</p>

                    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                        @foreach ($places as $place)
                            <div class="group relative">

                                <div
                                    class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                    <img src="{{ $place->images }}" alt="{{ $place->establishment }}"
                                         class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                </div>

                                <div class="mt-4 flex justify-between">
                                    <div>
                                        <h3 class="text-sm text-gray-700">
                                            <a class="lg:text-sm sm:text-3xl md:text-3xl"
                                               href="{{ URL::to("location/{$place->id}") }}">
                                                <span aria-hidden="true" class="absolute inset-0"></span>
                                                {{ $place->establishment }}
                                            </a>
                                        </h3>
                                        <p class="mt-1 lg:text-sm sm:text-2xl md:text-2xl text-gray-500">{{ $place->address }}</p>
                                        <p class="mt-1 lg:text-sm sm:text-2xl md:text-2xl text-gray-500">{{ $place->type }}</p>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
