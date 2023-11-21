@extends('layouts.layout')
@section('content')
    <main>
        <div class="mx-auto max-w-7xl py-0 lg:py-6 sm:px-6 lg:px-8">
            <div class="bg-white">
                <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 sm:py-10 lg:max-w-7xl lg:px-8">
                    <form action="{{ route('pubs.search') }}" method="GET">
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
                <div class="mx-auto max-w-2xl px-4 py-3 sm:px-6 lg:py-4 lg:max-w-7xl lg:px-8">
                    @if (!(( isset($search) && $search!="") || (isset($selected_neighbourhood) && $selected_neighbourhood!="") || ( isset($indoor) && $indoor=="1")))
                    <h2 class="text-2xl font-normal tracking-tight text-gray-900">Pubs, Brewpubs, and Breweries in
                        Toronto</h2>
                    <p class="text-sm text-gray-500 mt-2">The following list showcases the very best drinking
                        establishments in Toronto that are pooch friendly.</p>
                    @endif
                    <div class="text-sm mt-3 tracking-tight text-gray-900">{{ $places->total() }} dog friendly places found</div>
                    <div class="mt-6 grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                        @foreach ($places as $place)
                            <div class="group relative">
                                <div
                                        class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-xl bg-gray-200 lg:aspect-none group-hover:opacity-75 h-48 lg:h-80">
                                    <img src={{ $place->images }} alt="{{ $place->establishment }}"
                                         class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <div>
                                        <h3 class="text-sm text-gray-700">
                                            <a href="{{ URL::to("location/$place->establishment") }}">
                                                <span aria-hidden="true" class="absolute inset-0"></span>
                                                {{ $place->establishment }}
                                            </a>
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">{{ $place->address }}</p>
                                    </div>

                                </div>
                                <p class="text-sm text-gray-500">{{ $place->defined_type }}</p>
                            </div>
                        @endforeach
                    </div>
                    {{ $places->appends(request()->query())->links()  }}
                </div>
            </div>

        </div>
    </main>
@endsection


