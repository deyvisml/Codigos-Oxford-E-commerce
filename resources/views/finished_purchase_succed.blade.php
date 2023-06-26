@extends('layouts.app')

@section('title')
    Compra
@endsection

@section('content')
    <div class="my-8 mb-20 md:mx-32 sm:mx-10 mx-4 flex justify-center items-center flex-col md:h-96 sm:my-20">
        <p class="text-2xl font-semibold">¡Compra exitosa!</p>
        <p class=" text-center sm:p-3 pt-4 max-w-[700px]">
            ¡Gracias por su compra! Los códigos adquiridos serán enviados a su dirección de correo electrónico
            (<span class="text-sky-900 font-semibold">{{ auth()->user()->email }}</span>)
            una vez que se haya verificado el pago. Agradecemos su confianza en nuestro servicio.
        </p>
        <a class="underline text-sky-800" href="{{ route('purchase.list') }}">Mis compras</a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-52 h-52 text-neutral-300">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </div>
@endsection
