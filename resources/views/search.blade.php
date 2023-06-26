@extends('layouts.app')

@section('title')
    Resultados
@endsection

@section('content')
    <div class="my-8 mb-20 md:mx-32 sm:mx-10 mx-5">
        <div class="mb-5 border-b-2">
            <p class="text-2xl">Busqueda: <span class="font-semibold">{{ $keyword }}</span></p>
            <p class="py-2">{{ $products->total() }} resultados</p>
        </div>

        <div class="">
            <ul class="flex justify-start items-baseline flex-wrap gap-y-4 bg-gray-200 py-4 px-2 mb-3">

                @if ($products->total() > 0)
                    @foreach ($products as $product)
                        <li class="md:w-1/5 sm:w-1/2 w-full min-w-[200px]">
                            <div class="border-2 border-gray-200 bg-white rounded-xl shadow sm:mx-2 mx-0 hover:shadow-xl">
                                <a href="{{ route('products.index', ['product' => $product]) }}"
                                    class="block p-3 cursor-pointer">
                                    <div class="flex flex-col justify-center items-center text-center ">
                                        <div class="w-full h-44 flex justify-center items-center">
                                            <img src="{{ $product->image }}" alt="product image"
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
                @endif
            </ul>

            {{ $products->appends($_GET)->render() }}
            <!-- https://stackoverflow.com/a/50957867/15694873-->
        </div>

    </div>
@endsection
