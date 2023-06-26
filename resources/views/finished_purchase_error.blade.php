@extends('layouts.app')

@section('title')
    Compra
@endsection

@section('content')
    <div class="my-8 mb-20 md:mx-32 sm:mx-10 mx-4 flex justify-center items-center flex-col md:h-96 sm:my-20">
        <p class="text-2xl font-semibold">Error</p>
        <p class=" text-center sm:p-5 py-5 max-w-[700px]">
            Lo sentimos, algo salió mal. Para cualquier consulta, póngase en contacto con nuestro soporte en <span
                class="text-sky-900 font-semibold">oxfordcodes@gmail.com</span>. Gracias.
        </p>

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-52 h-52 text-neutral-300">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
        </svg>
    </div>
@endsection
