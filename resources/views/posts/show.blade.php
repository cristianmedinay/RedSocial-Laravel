@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex ">
        <div class="md:w-1/2">
            <img src="{{asset('/uploads/'.$post->imagen)}}" alt="{{$post->titulo}}" class=" border-gray-500 rounded-2xl shadow-amber-100 ">

            <div class="p-3 flex items-center">
                <p>
                    @auth


                        @if($post->checkLike(auth()->user()))
                            <form action="{{route('dashboard.likes.destroy',$post)}}" method="POST"  >
                                @csrf
                                @method('DELETE')
                                <div class="my-4">
                                    <button type="submit">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>
                                        
                                    </button>
                                </div>
                            </form>
                        @else
                            <form method="POST" action="{{route('dashboard.likes.store', $post)}}"  >
                                @csrf
                                <div class="my-4">
                                    <button type="submit">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>
                                        
                                    </button>
                                </div>
                            </form>
                        @endif
                    @endauth

                    <p>{{$post->likes->count()}} Likes</p>
                    
                </p>
            </div>

            <div>
                <a href="{{route('dashboard.index', $post->user)}} " class="font-bold">{{$post->user->username}} </a>
                   
                <p class="text-sm text-gray-500">{{$post->created_at->diffForHumans() }} </p>
                <p class="mt-5 text-xl text-gray-500">{{$post->descripcion}}</p>
            </div>
            
            @auth
                @if($post->user_id === auth()->user()->id)
                <form action="{{route('dashboard.destroy', $post)}}" method="POST"  >
                    <!--metodo spofi-->
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Eliminar Publicacion" class="bg-red-500 hover:bg-red-600
                        p-2 rounded text-white uppercase font-bold cursor-pointer mt-4 transition-colors"    
                    >

                </form>
                @endif
            @endauth
        </div>

        <div class="md:w-1/2 p-5">
            <div class="p-3">
                <div class="shadow bg-white p-5 mb-5">

                    @auth
                    <p class="text-sm font-bold text-center mb-4">Agrega un Nuevo Comentario </p>
                    

                    @if(session('mensaje'))
                        <div class="bg-green-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{session('mensaje')}}
                        </div>
                    @endif

                    <form action="{{route('comentarios.store', ['post' => $post, 'user' => $user])}}" method="POST" novalidate>
                        @csrf
                        <div class="mb-5 ">
                            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                                Añade un Comentario
                            </label>
                            <textarea id="comentario" name="comentario"  placeholder="Agregar un Comentario" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" ></textarea>

                            @error('comentario')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}} </p>
                            @enderror
                        </div>
                        
                        <input 
                        type="submit"
                        value="Comentar"
                        class="bg-sky-600 hover:bg-sky-700 transitions-colors cursor-pointer                     
                        uppercase font-bold w-full p-3 text-white rounded-lg"
                        />

                    </form>
                    @endauth



                    <div class="bg-white shadow mb-5 max-h-96 overflow-hidden-scroll mt-10">
                        @if($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-gray-300 border-b ">
                                <a href="{{route('dashboard.index', $comentario->user)}}" class="font-bold">{{$comentario->user->username}}</a>
                                <p>{{$comentario->comentario }} </p>
                                <p class="text-gray-500 text-sm"> 
                                    
                                    <span class="font-bold">{{$comentario->created_at->diffForHumans()}} </span>
                                </p>
                                
                                
                            </div>
                        @endforeach
                        @else
                            <p class="p-10 text-center">No hay Comentarios aún</p>
                        @endif
                    </div>


                </div>

               
            </div>
        </div>
    </div>

@endsection