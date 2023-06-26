@extends('layouts.app')

@section('title')
    Mis compras
@endsection

@section('content')
    <div class="bg-neutral-100 pb-10">
        <div class="py-8 mb-20 md:mx-32 sm:mx-10 mx-5 min-h-screen">

            <h2 class="text-2xl font-semibold border-b-2 pb-3">
                Compras
            </h2>

            <ul class="mt-5">
                @if (count($orders) > 0)
                    @foreach ($orders as $order)
                        <li class="bg-white rounded border shadow mb-4">
                            <div class="p-3 py-4 font-bold border-b-2 text-xs">
                                {{ \Carbon\Carbon::parse($order['data']->created_at)->format('j \d\e F \d\e Y') }}

                            </div>
                            <div class="flex p-3 py-4 w-full sm:flex-nowrap flex-wrap">
                                <div
                                    class="sm:w-28 h-28 p-2 sm:mb-0 mb-2 me-4 flex justify-center items-center border self-center w-full">
                                    <img src="{{ $order['product']->image }}" alt="producto"
                                        class="object-contain h-full max-w-[70px]">
                                </div>
                                <div class="text-sm md:w-3/4 w-full">
                                    <p class="pb-1 text-neutral-600">#{{ $order['data']->id }}</p>
                                    <p class="pb-1 flex items-end gap-x-2">Estado:
                                        @if ($order['data']->payment_issue)
                                            <span class="bg-red-600 rounded p-0.5 px-1 text-xs text-white font-semibold">
                                                Pago rechazado
                                            </span>
                                        @elseif ($order['data']->email_sent)
                                            <span class="bg-green-600 rounded p-0.5 px-1 text-xs text-white font-semibold">
                                                Entregado
                                            </span>
                                        @else
                                            <span class="bg-blue-600 rounded p-0.5 px-1 text-xs text-white font-semibold">
                                                Pendiente
                                            </span>
                                        @endif
                                    </p>
                                    <ul class="flex justify-between items-start sm:flex-nowrap flex-wrap">
                                        <li class="sm:w-3/5 w-full mb-2">
                                            <p class="font-bold py-1">Elemento</p>
                                            <a href="{{ route('products.index', ['product' => $order['product']]) }}"
                                                class="underline cursor-pointer text-sky-800">
                                                {{ $order['product']->name }}
                                            </a>
                                        </li>
                                        <li class="sm:text-right text-left sm:w-1/5 w-full mb-2">
                                            <p class="font-bold py-1">Cantidad</p>
                                            <p>{{ $order['data']->quantity }}</p>
                                        </li>
                                        <li class="sm:text-right text-left sm:w-1/5 w-full mb-2">
                                            <p class="font-bold py-1">Total</p>
                                            <p>{{ $order['data']->user_paid }} usd</p>
                                        </li>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                    <p class="text-center">Lista de compras vacia.</p>
                @endif
            </ul>
        </div>
    </div>
@endsection
