@extends('layouts.app')

@section('title')
    Series
@endsection


@push('css-scripts')
@endpush

@section('content')
    <div class="md:mx-32 sm:mx-10 my-8 mb-20 mx-5">

        <div class="border-b-2 pb-5">
            <h3 class="text-2xl font-semibold mb-5">Seleccione una serie o titulo</h3>

            <div class="mb-3 md:w-1/2 w-full">
                <select data-te-select-init id="select_series" name="miselect" size="10">
                    @foreach ($series as $serie)
                        <option class="{{ $current_serie->id }}"
                            value="{{ route('series.show', ['category' => $current_category, 'serie' => $serie]) }}"
                            {{ $serie->id === $current_serie->id ? 'selected' : '' }}>
                            {{ $serie->name }}
                        </option>
                    @endforeach
                </select>
                <label data-te-select-label-ref>Serie</label>
            </div>
        </div>

        <div class="flex flex-wrap">
            <h3 class="text-xl block w-full font-semibold my-4">Niveles</h3>

            <div class="sm:w-1/4 min-w-[280px] w-full mb-4 border">
                <ul id="serie_list_ul">
                    @php
                        $first_time = true;
                    @endphp
                    @foreach ($levels as $level)
                        @if ($first_time)
                            <li data-level-id="{{ $level->id }}"
                                class="level_li border-b-2  hover:bg-gray-200 bg-gray-200 p-3 cursor-pointer">
                                {{ $level->name }}
                            </li>
                            {{ $first_time = false }}
                        @else
                            <li data-level-id="{{ $level->id }}"
                                class="level_li border-b-2  hover:bg-gray-200 bg-gray-50 p-3 cursor-pointer">
                                {{ $level->name }}
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="md:w-3/4 w-full bg-gray-200 py-4 px-2 md:min-h-[390px] self-baseline">
                @php
                    $first_time = true;
                @endphp

                @foreach ($product_groups as $product_group)
                    @if ($first_time)
                        <ul id="products_level_{{ $product_group['level']->id }}"
                            class="products_level flex justify-start flex-wrap gap-y-4  border-2 w-full">
                            @if (count($product_group['products']) > 0)
                                @foreach ($product_group['products'] as $product)
                                    <li class="md:w-1/4 sm:w-1/2 w-full min-w-[200px]">
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
                            @else
                                <p class="sm:mx-2 mx-0">Sin productos</p>
                            @endif
                        </ul>
                        {{ $first_time = false }}
                    @else
                        <ul id="products_level_{{ $product_group['level']->id }}"
                            class="products_level justify-start flex-wrap gap-y-4  border-2 w-full hidden">
                            @if (count($product_group['products']) > 0)
                                @foreach ($product_group['products'] as $product)
                                    <li class="md:w-1/4 sm:w-1/2 w-full min-w-[200px]">
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
                            @else
                                <p class="sm:mx-2 mx-0">Sin productos</p>
                            @endif
                        </ul>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('js-scripts')
    <script>
        const select_series_element = document.querySelector("#select_series");

        select_series_element.addEventListener("change", function() {
            const url = this.value;

            console.log(this);

            window.location.href = url;
        });

        // Obtén el elemento padre que contiene todos los elementos <li>
        var levels_container = document.querySelector('#serie_list_ul');

        // Agrega un evento de clic al elemento padre
        levels_container.addEventListener('click', function(event) {
            // Verifica que el evento de clic se haya originado en un elemento <li>
            if (event.target.classList.contains('level_li')) {
                // Obtiene el valor del atributo data-id del elemento <li> clicado
                const level_id = event.target.getAttribute('data-level-id');

                // SELECTED LEVEL

                // deselected the current li level
                const level_to_deseleced = document.querySelector(`.level_li.bg-gray-200`);
                level_to_deseleced?.classList.remove("bg-gray-200");
                level_to_deseleced?.classList.add("bg-gray-50");

                // select the new level
                const level_to_seleced = event.target;
                level_to_seleced.classList?.remove("bg-gray-50");
                level_to_seleced.classList?.add("bg-gray-200");

                // SHOW PRODUCTS

                // hiden the current produts of a level
                const products_level_to_hidden = document.querySelector(`.products_level:not(.hidden)`);
                products_level_to_hidden?.classList.add("hidden");

                // showhing the products for the new selected level
                const products_level_to_show = document.querySelector(`#products_level_${level_id}`);
                products_level_to_show?.classList.add("flex");
                products_level_to_show?.classList.remove("hidden");
            }
        });
    </script>
@endpush
