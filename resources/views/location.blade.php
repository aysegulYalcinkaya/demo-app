@extends('layouts.layout')
@section('content')
<div class="mx-auto max-w-7xl py-6 lg:px-8 sm:w-screen">
    <div class="bg-white px-6 sm:py-6 md:py-12 lg:py-12 lg:px-8">
        <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true">
        </div>

        <div class="flex flex-row">
            <div class="mr-6">
            <h1 class="lg:text-2xl sm:text-4xl md:text-4xl mb-6">{{ $place->establishment }}</h1>
            </div>
            <div>
                <button class="bg-red-600 text-white font-normal lg:text-xl sm:text-2xl md:text-3xl py-1 px-4 rounded">
                    {{ $place->type }}
                </button>
            </div>
        </div>
        <div class="flex flex-row grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2">

            <div class="lg:mr-6">
                <div><img src="{{ $place->images }}" alt="{{ $place->establishment }}"></div>
                <div class="py-6"><p class="lg:text-sm md:text-3xl md:text-3xl">{{ $place->about }}</p></div>
            </div>
            <div>
                <div>MAP</div>
                <div class="flex flex-row mt-6">
                    <div class="mr-4"><img class="lg:h-5 lg:w-5 sm:h-10 sm:w-10" src="https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/eea88cea-8bee-437e-9552-9e96ba8bc600/public"></div>
                    <div><p class="lg:text-sm sm:text-2xl">{{ $place->address }}</p></div>
                </div>
                <div class="flex flex-row mt-2">
                    <div class="mr-4"><img class="lg:h-5 lg:w-5 sm:h-10 sm:w-10" src="https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/7ac95214-152a-4af8-005d-3fa1e631f900/public"></div>
                    <div><p class="lg:text-sm sm:text-2xl">{{ $place->website }}</p></div>
                </div>
                <div class="flex flex-row mt-2">
                    <div class="mr-4"><img class="lg:h-5 lg:w-5 sm:h-10 sm:w-10" src="https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/18d0ff8c-389f-46c6-f4f4-692000f90600/public"></div>
                    <div><p class="lg:text-sm sm:text-2xl">{{ $place->instagram }}</p></div>
                </div>
                </div>
            </div>



    </div>
</div>
@endsection
