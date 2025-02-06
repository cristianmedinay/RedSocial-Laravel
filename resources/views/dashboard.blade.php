@extends('layouts.app')

@section('titulo')
    Tu Cuenta

    Perfil: {{$user->username}}
@endsection

@section('contenido')


    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
            <div class="md:w-8/12 ld:w-6/12 px-5">
                <img src="{{asset('img/usuario.svg')}}" alt="">
            </div>
            <div class="md:w-8/12 ld:w-6/12 px-5 md:flex md:flex-col justify-center items-center py-10 md:py-10 md:items-start">
                
                {{-- <p class="text-gray-700 text-2xl">{{auth()->user()->username}} </p> --}}
                <p class="text-gray-700 text-2xl">{{$user->username}} </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    <span class="font-normal"> Seguidores </span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    <span class="font-normal"> Seguidores </span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    <span class="font-normal"> Posts </span>
                </p>
            </div>

        </div>

    </div>
@endsection