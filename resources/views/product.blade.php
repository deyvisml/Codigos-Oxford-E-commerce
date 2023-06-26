@extends('layouts.app')

@section('title')
    {{ $product->name }}
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
    <div class="my-8 mb-20 md:mx-32 sm:mx-10 mx-5">
        <div class="flex gap-x-2 items-center flex-wrap sm:text-base text-sm">
            <a href="{{ route('home.index') }}" class="text-sky-800 hover:underline">Inicio</a>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor"
                class="w-3 h-3 mt-0.5 text-gray-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>

            <a href="{{ route('series.index', ['category' => $category]) }}"
                class="text-sky-800 hover:underline">{{ $category->name }}</a>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4"
                stroke="currentColor" class="w-3 h-3 mt-0.5 text-gray-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>

            <a href="{{ route('series.show', ['category' => $category, 'serie' => $serie]) }}"
                class="text-sky-800 hover:underline">{{ $serie->name }}</a>
        </div>

        <h2 class="text-2xl font-semibold mt-5 border-b-2 pb-3">
            {{ $product->name }}
        </h2>

        <div class="flex my-5 flex-wrap justify-around py-5 items-start">
            <div class="md:w-52 border rounded flex justify-center items-center h-52 p-5">
                <img src="{{ $product->image }}" alt="" class="h-full object-contain max-w-[150px]">
            </div>

            <div class="md:w-6/12 w-full md:m-5 mx-2 md:my-0 my-5 md:order-2 order-3">

                <p class="text-xl font-semibold">Caracteristicas principales</p>

                <ul class="bg-white my-5 rounded">
                    <li class="flex border-b border-gray-300">
                        <p class="w-1/3 font-bold text-sm bg-gray-100 p-3">Edición</p>
                        <p class="w-2/3 text-sm p-3 bg-gray-50">{{ $product->edition }}</p>
                    </li>
                    <li class="flex border-b border-gray-300">
                        <p class="w-1/3 font-bold text-sm bg-gray-200 p-3">Formato</p>
                        <p class="w-2/3 text-sm p-3 bg-gray-50">{{ $product->format }}</p>
                    </li>
                    <li class="flex border-b border-gray-300">
                        <p class="w-1/3 font-bold text-sm bg-gray-100 p-3">Nivel</p>
                        <p class="w-2/3 text-sm p-3 bg-gray-50">{{ $level->name }}</p>
                    </li>
                    <li class="flex border-b border-gray-300">
                        <p class="w-1/3 font-bold text-sm bg-gray-200 p-3">Duración</p>
                        <p class="w-2/3 text-sm p-3 bg-gray-50">{{ $product->licence_length }}</p>
                    </li>
                    <li class="flex border-b border-gray-300">
                        <p class="w-1/3 font-bold text-sm bg-gray-100 p-3">ISBN</p>
                        <p class="w-2/3 text-sm p-3 bg-gray-50">{{ $product->isbn }}</p>
                    </li>

                </ul>
            </div>

            <div
                class="md:w-80 sm:w-auto md:my-0 my-5 w-full rounded bg-white shadow border-2 border-gray-100 p-4 md:order-3 order-2">
                <p class="text-4xl font-semibold">{{ $product->price_usd }} USD</p>
                <p class="my-3 text-sky-700 text-sm font-semibold">Stock disponible
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 mb-1 inline-block">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                    </svg>
                </p>

                <label for="cantidad" class="block my-2 text-sm font-semibold text-gray-700">Cantidad: (max 10)</label>
                <input type="number" value="1" step="1" min="1" max="10"
                    class="border-2 rounded outline-none p-2" id="cantidad">

                @auth
                    <button type="button" data-te-toggle="modal" data-te-target="#payment_modal" data-te-ripple-init
                        data-te-ripple-color="light"
                        class="w-full bg-blue-600 rounded bg-primary py-2.5  mt-4 font-semibold leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]  focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">
                        Comprar ahora
                    </button>
                @endauth
                @guest
                    <a class="w-full bg-blue-600 block text-center rounded bg-primary py-2.5  mt-4 font-semibold leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]  focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                        href="{{ route('login') }}">Comprar ahora</a>
                @endguest

                <div class="flex justify-center items-center w-full h-9 mt-3">
                    <img src="{{ asset('images/payment-methods.png') }}" alt="" class="object-contain max-h-full">
                </div>

                <!-- PayPal payment modal-->
                <div data-te-modal-init
                    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                    id="payment_modal" tabindex="-1" aria-labelledby="payment_modal" aria-modal="true" role="dialog">
                    <div data-te-modal-dialog-ref
                        class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                        <div
                            class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-white">
                            <div
                                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                <!--Modal title-->
                                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-gray-600"
                                    id="payment_modalLabel">
                                    Completar pago
                                </h5>
                                <!--Close button-->
                                <button type="button"
                                    class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                    data-te-modal-dismiss aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!--Modal body-->
                            <div class="relative p-4">

                                <div id="paypal-button-container">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="md:mt-16 mt-8">
            <h3 class="text-xl font-semibold pb-3 border-b-2">Productos similares</h3>

            <div class="splide" id="splide-1">
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
                        @foreach ($similar_products as $similar_product)
                            <li class=" w-full splide__slide">
                                <div
                                    class="border-2 border-gray-200 bg-white rounded-xl shadow sm:mx-2 mx-0 hover:shadow-xl">
                                    <a href="{{ route('products.index', ['product' => $similar_product]) }}"
                                        class="block p-3 cursor-pointer">
                                        <div class="flex flex-col justify-center items-center text-center ">
                                            <div class="w-full h-44 flex justify-center items-center">
                                                <img src="{{ $similar_product->image }}" alt="imagen item"
                                                    class="object-contain h-full max-w-[140px]">
                                            </div>

                                            <div class="w-full text-start">
                                                <p
                                                    class="text-sm font-semibold pt-5  text-sky-900 h-24 hover:underline cursor-pointer">
                                                    {{ $similar_product->name }}
                                                </p>
                                                <p
                                                    class="block text-start text-xs font-semibold mb-2 text-gray-600 cursor-pointer">
                                                    ISBN: <span class="font-normal">{{ $similar_product->isbn }}</span>
                                                </p>
                                                <p class="text-2xl font-semibold text-gray-800 cursor-pointer">
                                                    {{ $similar_product->price_usd }} USD
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
    </div>
@endsection


@push('js-scripts')
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

    <script>
        const splide1 = new Splide('#splide-1', {
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

        splide1.mount();
    </script>

    <script>
        // Escucha el evento 'input' en el campo de formulario
        document.querySelector("#cantidad").addEventListener('change', function() {
            // Obtén el valor del campo del formulario
            const cantidad = this.value;

            // Verifica si el valor está fuera del rango establecido
            if (cantidad < 1 || cantidad > 10) { // Ejemplo: rango de 0 a 100
                // Establece un valor por defecto
                const default_value = 1; // Ejemplo: valor por defecto de 50

                // Verifica si el valor es menor que 0 y establece el valor mínimo
                if (cantidad < 1) {
                    this.value = 1;
                }
                // Verifica si el valor es mayor que 100 y establece el valor máximo
                else if (cantidad > 10) {
                    this.value = 10;
                }
                // Si el valor está dentro del rango pero no es un número válido, establece el valor por defecto
                else {
                    this.value = default_value;
                }
            }
        });
    </script>


    {{-- Paypal --}}
    <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=USD"></script>

    <script>
        function init_paypal_button() {
            let cantidad = document.querySelector("#cantidad").value;
            paypal.Buttons({
                style: {
                    shape: 'rect',
                    color: '',
                    layout: 'vertical',
                    label: 'pay',
                },

                createOrder: function(data, actions) {
                    cantidad = document.querySelector("#cantidad").value;

                    if (cantidad < 1 || cantidad > 10) {
                        cantidad = 1;
                    }

                    let price_usd = {{ $product->price_usd }};
                    //price_usd = Number(price_usd.substring(2, price_usd.length));
                    const total_price = price_usd * cantidad;

                    return actions.order.create({
                        purchase_units: [{
                            "description": `{{ $product->name }} x ${cantidad}`,
                            "amount": {
                                "currency_code": "USD",
                                "value": total_price
                            }
                        }]
                    });
                },

                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        fetch("{{ route('purchase.proccess') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Si estás utilizando Laravel para proteger contra CSRF, incluye el token CSRF en la solicitud
                                },
                                body: JSON.stringify({
                                    "product_id": {{ $product->id }},
                                    "quantity": cantidad,
                                    "details": details,
                                }),
                            }).then(response => response.json()) // Parsea el response a JSON
                            .then(data => {
                                console.log(data.status);

                                if (data.status === "succed") {
                                    window.location.href = "{{ route('purchase.finish_succed') }}";
                                } else {
                                    window.location.href = "{{ route('purchase.finish_error') }}";
                                }
                            })
                            .catch(error => {
                                // Maneja errores si es necesario
                            });
                    });
                },

                onError: function(err) {
                    console.log(err);
                    alert("Ocurrio un error al procesar el pago, intentelo nuevamente.")
                }
            }).render('#paypal-button-container');
        }
        init_paypal_button();
    </script>
@endpush
