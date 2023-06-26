<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://codigosoxford.com" />
    @if (Route::currentRouteName() == 'products.show')
        <meta property="og:title" content="Codigos Oxford - {{ $product->name }}" />
        <meta property="og:image:url" content="{{ $product->image }}" />
    @elseif (Route::currentRouteName() == 'series.show')
        <meta property="og:title" content="Codigos Oxford - {{ $current_serie->name }}" />
        <meta property="og:image:url" content="https://elt.oup.com/system/img/favicon-152.png" />
    @elseif (Route::currentRouteName() == 'schools.show')
        <meta property="og:title" content="Codigos Oxford - {{ $current_school->name }}" />
        <meta property="og:image:url" content="https://elt.oup.com/system/img/favicon-152.png" />
    @else
        <meta property="og:title" content="Codigos Oxford" />
        <meta property="og:image:url" content="https://elt.oup.com/system/img/favicon-152.png" />
    @endif
    <meta property="og:description"
        content="En nuestro e-commerce encontraras los codigos que necesitas para acceder a las plataformas de aprendizaje Oxford Learn, incluyendo Online Practice y e-books. Con nuestros codigos, tendras acceso a una amplia variedad de recursos educativos en linea que te ayudaran a mejorar tus habilidades linguisticas de manera efectiva y dinamica. ¡No esperes mas para empezar tu camino hacia el exito academico y profesional! Descubre nuestra seleccion de codigos y elige el que mejor se adapte a tus necesidades en nuestro sitio web." />


    <title>Códigos Oxford - @yield('title')</title>

    <link rel="icon" href="https://elt.oup.com/system/img/favicon-152.png">


    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com/3.2.4"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                fontFamily: {
                    sans: ["Roboto", "sans-serif"],
                    body: ["Roboto", "sans-serif"],
                    mono: ["ui-monospace", "monospace"],
                },
            },
            corePlugins: {
                preflight: false,
            },
        };
    </script>

    @stack('css-scripts')

    @vite(['resources/css/tw-elements.min.css'])
</head>

<body class="">

    @php
        // mala practica pero no pude crear una controlador para esta vista template
        use App\Models\Country;
        use App\Models\Category;
        
        // get  countries
        $countries = Country::get();
        
        // get categories
        $categories = Category::limit(5)->get();
    @endphp

    <nav class="flex flex-wrap justify-between md:px-32 sm:px-10 px-4 items-center py-2 bg-sky-900 sm:gap-x-4 gap-x-2">
        <div class="flex items-center md:justify-between justify-center flex-wrap md:w-2/12 w-full">
            <a href="/" class="w-auto">
                <img src="{{ asset('images/logo.png') }}" alt="imagen logo" class="object-contain max-h-[75px]">
            </a>
        </div>

        <form action="{{ route('search.index') }}" method="get"
            class="search-container md:w-5/12 w-full sm:min-w-[400px] md:my-0 mt-3 flex items-center justify-center">

            <div class="md:w-full w-full rounded flex items-center border-y border-s overflow-hidden ">
                <input type="text" name="keyword" placeholder="Buscar por titulo, ISBN, etc."
                    class="w-11/12 p-2 outline-none" autofocus required>

                <button type="submit" data-te-ripple-init data-te-ripple-color="dark"
                    class="flex justify-center bg-neutral-200 py-2 px-4 cursor-pointer hover:bg-neutral-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
            </div>
        </form>

        <!-- dropdown component -->
        <div class="relative my-3 w-2/12 min-w-[180px]" data-te-dropdown-ref>
            <button
                class="flex items-center whitespace-nowrap rounded bg-neutral-50 px-4 py-1.5 text-sm font-medium leading-normal text-neutral-800  transition duration-150 ease-in-out hover:bg-neutral-100  focus:bg-neutral-100 focus:outline-none focus:ring-0 active:bg-neutral-200 active:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] motion-reduce:transition-none"
                type="button" id="dropdownMenuButton9" data-te-dropdown-toggle-ref aria-expanded="false"
                data-te-ripple-init>
                Soy estudiante
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 ms-2 mb-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                </svg>

                <span class="ml-2 w-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </button>
            <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                aria-labelledby="dropdownMenuButton9" data-te-dropdown-menu-ref>
                @foreach ($countries as $country)
                    <li>
                        <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                            href="{{ route('schools.index', ['country' => $country]) }}" data-te-dropdown-item-ref>
                            {{ $country->name }}
                            <img src="{{ asset('images/country-flags/' . $country->flag) }}"
                                class="w-6 h-6 inline-block ms-2 mb-1" alt="">
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- END dropdown component -->

        <div class="w-auto min-w-[150px] my-2 flex justify-end">
            @auth
                <div class="relative" data-te-dropdown-ref>
                    <!-- Second dropdown trigger -->
                    <a class="hidden-arrow flex items-center whitespace-nowrap transition duration-150 ease-in-out motion-reduce:transition-none justify-center cursor-pointer"
                        href="#" id="dropdownMenuButton2" role="button" data-te-dropdown-toggle-ref
                        aria-expanded="false">
                        <!-- User avatar -->
                        <img src="{{ auth()->user()->picture }}"
                            class="w-9 h-9 rounded-full border-neutral-300 border-2 me-2" alt="" loading="lazy" />
                        <p class="text-neutral-100 me-1 text-sm cursor-pointer">{{ auth()->user()->first_name }}</p>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 text-neutral-100 mt-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </a>
                    <!-- Second dropdown menu -->
                    <ul class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                        aria-labelledby="dropdownMenuButton2" data-te-dropdown-menu-ref>
                        <!-- Second dropdown menu items -->
                        <li>
                            <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                                href="{{ route('purchase.list') }}" data-te-dropdown-item-ref>Mis compras</a>
                        </li>
                        <li>
                            <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                                href="/google-auth/logout" data-te-dropdown-item-ref>Salir</a>
                        </li>
                    </ul>
                </div>
            @endauth
            @guest
                <a href="/google-auth/redirect" class="text-gray-100 text-left">Ingresar / Registrarse</a>
            @endguest
        </div>
    </nav>
    <nav class="md:px-32 sm:px-10 px-5 bg-neutral-50 border-y-4 border-gray-300">
        <ul class=" flex flex-wrap justify-start text-sm">
            @foreach ($categories as $category)
                <li
                    class="{{ isset($current_category) ? ($category->id === $current_category->id ? 'bg-neutral-200' : '') : '' }} sm:w-auto w-full">
                    <a href="{{ route('series.index', ['category' => $category]) }}"
                        class="text-gray-900 block p-1 px-4 hover:text-black hover:bg-neutral-200">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>

    <main class="bg-white">
        @yield('content')
    </main>

    <footer class="h-24 bg-sky-200 flex justify-center items-center">
        <p class="text-center">Códigos Oxford 2022 ©</p>
    </footer>


    <!--<script src="https://cdn.jsdelivr.net/npm/tw-elements@1.0.0-beta1/dist/js/index.min.js"></script>-->
    @vite(['resources/js/tw-elements.umd.min.js'])

    @stack('js-scripts')
</body>

</html>
