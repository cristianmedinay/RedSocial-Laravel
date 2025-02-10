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

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl font-black text-center my-10">Publicaciones</h2>


        @if($posts -> count())
            <div class=" grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 ">  
                @foreach ($posts as $post)
                <div>

                    <a href="{{route('dashboard.show', ['post' => $post, 'user' => $user])}}">
                        <p>{{$post->titulo}}</p>
                        <img src="/uploads/{{$post->imagen}}" alt="imagen publicacion {{$post->titulo}}" class="w-full">
                    </a>
                </div>
                @endforeach
            </div>



            <div>
                {{$posts->links()}} 
            </div>


        @else

            <p class="text-center text-gray-600 uppercase text-sm text-center font-bold ">No hay publicaciones aun</p>

        @endif
        

    </section>

@endsection