@extends('layouts.layout')
@section('content')
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div
                    class="relative overflow-hidden lg:rounded-3xl md:rounded-3xl bg-cover bg-no-repeat p-12 text-center"
                    style="background-image: url('https://imagedelivery.net/oft5YRXFnZE_M4wW8ODw6Q/e75226d6-b591-4622-2c82-f0ab1327a100/public'); height: 700px">
                <div
                        class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
                        style="background-color: rgba(0, 0, 0, 0.6)">
                    <div class="flex h-full items-center justify-center">
                        <div class="text-white">
                            <h2 class="mb-4 lg:text-7xl sm:text-7xl font-semibold">Welcome To PawsList</h2>
                            <h4 class="mb-6 lg:text-2xl sm:text-3xl font-semibold pb-10">The Best Guide To Dog Friendly Places In Toronto</h4>
                            <button
                                    type="button"
                                    class="rounded border-2 border-neutral-50 px-7 pb-[8px] pt-[10px] lg:text-2xl sm:text-3xl font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                    data-te-ripple-init
                                    data-te-ripple-color="light">
                                <a href="/places">Come inside</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
