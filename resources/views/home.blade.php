@extends('layouts.app')

@section('title')
    Inicio
@endsection

@push('css-scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <style>
        .splide__pagination {
            visibility: hidden !important;
            bottom: -20px !important;
        }

        @media (min-width: 640px) {
            .splide__pagination {
                visibility: visible !important;
            }
        }

        .splide__pagination__page {
            background-color: gray !important;
        }

        .splide__pagination__page.is-active {
            background-color: #0369a1 !important;
        }

        .splide__arrow--prev {
            background-color: #0369a1 !important;
            margin-left: -50px;
            font-size: 25px;
        }

        .splide__arrow--next {

            background-color: #0369a1 !important;
            margin-right: -50px;
            font-size: 25px;
        }
    </style>
@endpush

@section('content')
    <!-- Carousel imagenes -->

    <div id="carouselExampleCaptions" class="relative md:h-80 sm:h-72 h-44" data-te-carousel-init data-te-carousel-slide>
        <!--Carousel indicators-->
        <div class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
            data-te-carousel-indicators>
            <button type="button" data-te-target="#carouselExampleCaptions" data-te-slide-to="0" data-te-carousel-active
                class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-te-target="#carouselExampleCaptions" data-te-slide-to="1"
                class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                aria-label="Slide 2"></button>
            <button type="button" data-te-target="#carouselExampleCaptions" data-te-slide-to="2"
                class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                aria-label="Slide 2"></button>
        </div>

        <!--Carousel items-->
        <div class="relative w-full overflow-hidden after:clear-both after:block after:content-[''] h-full">
            <!--First item-->
            <div class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none h-full"
                data-te-carousel-active data-te-carousel-item style="backface-visibility: hidden">
                <img src="{{ asset('images/carousel_images/image1.jpg') }}" class="w-full h-full object-cover"
                    alt="..." />
                <div class="absolute inset-x-[15%] bottom-10 py-5 text-center text-white block">
                    <h1 class="sm:text-2xl text-base sm:block hidden font-bold drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)]">
                        Códigos Oxford
                    </h1>
                    <p class="sm:text-base text-sm drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)]">
                        Adquiere tus códigos y licencias digitales de Oxford University Press (OUP).
                    </p>
                </div>
            </div>

            <!--Second item-->
            <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none h-full"
                data-te-carousel-item style="backface-visibility: hidden">
                <img src="{{ asset('images/carousel_images/image2.jpg') }}" class="w-full h-full object-cover"
                    alt="..." />
                <div class="absolute inset-x-[15%] bottom-10 py-5 text-center text-white block">
                    <h2 class="sm:text-2xl text-base font-bold drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)]">Online Practice
                    </h2>
                    <p class="sm:text-base text-sm drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)]">
                        Adquiere códigos y licencias digitales para el Online Practice.
                    </p>
                </div>
            </div>

            <!--Third item-->
            <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none h-full"
                data-te-carousel-item style="backface-visibility: hidden">
                <img src="{{ asset('images/carousel_images/image3.jpg') }}" class="w-full h-full object-cover"
                    alt="..." />
                <div class="absolute inset-x-[15%] bottom-10 py-5 text-center text-white block">
                    <h2 class="sm:text-2xl text-base font-bold drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)]">Oxford Learner’s
                        Bookshelf
                    </h2>
                    <p class="sm:text-base text-sm drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)]">
                        Adquiere códigos y licencias digitales para el Student Book y el Workbook en formato e-book
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- END Carousel imagenes -->

    <div class="bg-gray-200 border">
        <div
            class="my-8 md:mx-32 sm:mx-10 mx-5 bg-white border-s-4 border-sky-600 flex items-center flex-wrap p-5 gap-x-10 gap-y-5 shadow">
            <p class="block text-xl">Formas de pago</p>

            <ul class="flex flex-wrap md:gap-16 gap-5 md:justify-around justify-start items-center">
                <li><img class="md:h-10 h-8 rounded"
                        src="https://brifly-media.s3.ap-south-1.amazonaws.com/s3fs-public/styles/large/public/article/2020-10/Paypal.png?itok=XofbtBOA"
                        alt=""></li>
                <li><img class="md:h-10 h-8 rounded" src="https://www.b-payment.com/docs/images/logos/Visa_logo.png"
                        alt="">
                </li>
                <li><img class="md:h-10 h-8 rounded"
                        src="https://logos-world.net/wp-content/uploads/2020/09/Mastercard-Logo.png" alt="">
                </li>
                <li><img class="md:h-10 h-8 rounded"
                        src="https://logos-world.net/wp-content/uploads/2020/11/American-Express-Logo.png" alt="">
                </li>
                <!--<li><img class="md:h-10 h-8 rounded"
                                                                                                                src="https://d2a95c7k4laywg.cloudfront.net/wp-content/uploads/2021/03/bcp-logo-300x117.png"
                                                                                                                alt=""></li>
                                                                                                        <li><img class="md:h-10 h-8 rounded"
                                                                                                                    src="https://yt3.googleusercontent.com/l048nvZUXxmhjaDjxdJntZWSj03oOAK0ETKCQZup-Ea-aM_h8M94Jz87cw8JiwCHSEbv8llH=s176-c-k-c0x00ffffff-no-rj"
                                                                                                                    alt=""></li>-->
            </ul>
        </div>

        <div class="my-8 md:mx-32 sm:mx-10 mx-5 bg-white border-s-4 border-sky-600 p-5 shadow">
            <p class="block font-semibold mb-3">Titulos o series</p>

            <ul class="flex flex-wrap gap-2 gap-y-3 justify-start sm:p-2 px-0">
                @foreach ($series as $serie)
                    <li class="">
                        <a href="{{ route('home.serie', ['serie' => $serie]) }}"
                            class="rounded-md border-2 border-gray-300 bg-gray-200 py-1 px-2 hover:bg-gray-300 text-xs uppercase">
                            {{ $serie->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>



    <div class="bg-gray-100 mb-20">
        @php
            $i = 1;
        @endphp
        @foreach ($group_products as $group_product)
            <div class="py-5 md:px-32 px-10 @if ($i % 2 == 0) bg-gray-200 @else bg-gray-100 @endif">
                <a href="{{ route('home.serie', ['serie' => $group_product['serie']]) }}"
                    class="hover:underline cursor-pointer decoration-gray-500">
                    <h2 class="text-2xl font-semibold text-gray-500 cursor-pointer inline" id="section1">
                        {{ $group_product['serie']->name }}
                    </h2>
                </a>
                <div class="splide" id="splide-{{ $i }}">
                    <div class="splide__arrows">
                        <button class="bg-gray-900 shadow splide__arrow splide__arrow--prev">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </button>
                        <button class="bg-gray-900 shadow splide__arrow splide__arrow--next">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </button>
                    </div>
                    <div class="splide__track my-4">
                        <ul class="splide__list">
                            @foreach ($group_product['products'] as $product)
                                <li class=" w-full splide__slide">
                                    <div
                                        class="border-2 border-gray-200 bg-white rounded-xl shadow sm:mx-2 mx-0 hover:shadow-xl">
                                        <a href="{{ route('products.index', ['product' => $product]) }}"
                                            class="block p-3 cursor-pointer">
                                            <div class="flex flex-col justify-center items-center text-center ">
                                                <div class="w-full h-44 flex justify-center items-center">
                                                    <img src="{{ $product->image }}" alt="imagen item"
                                                        class="object-contain h-full max-w-[140px]">
                                                </div>

                                                <div class="w-full text-start">
                                                    <p
                                                        class="text-sm font-semibold pt-5  text-sky-900 h-24 hover:underline cursor-pointer">
                                                        {{ $product->name }}
                                                    </p>
                                                    <p
                                                        class="block text-start text-xs font-semibold mb-2 text-gray-600 cursor-pointer">
                                                        ISBN: <span class="font-normal">{{ $product->isbn }}</span>
                                                    </p>
                                                    <p class="text-2xl font-semibold text-gray-800 cursor-pointer">
                                                        {{ $product->price_usd }} USD
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @php
                $i++;
            @endphp
        @endforeach
    </div>
@endsection



@push('js-scripts')
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

    <script>
        for (let i = 1; i <= 5; i++) {
            const splide = new Splide(`#splide-${i}`, {
                perPage: 5,
                breakpoints: {
                    640: {
                        perPage: 1,
                    },
                    880: {
                        perPage: 2,
                    },
                    1100: {
                        perPage: 3
                    },
                    1300: {
                        perPage: 4
                    }
                },
            });
            splide.mount();
        }
    </script>
@endpush
