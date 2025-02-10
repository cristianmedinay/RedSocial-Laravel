@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex ">
        <div class="md:w-1/2">
            <img src="{{asset('/uploads/'.$post->imagen)}}" alt="{{$post->titulo}}" class=" border-gray-500 rounded-2xl shadow-amber-100 ">

            <div class="p-3">
                <p>0 likes</p>
            </div>

            <div>
                <p class="font-bold">{{$post->user->username}} </p>
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