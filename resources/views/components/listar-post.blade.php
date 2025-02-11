<div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->

    @if($posts -> count())
        <div class=" grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6 ">  
            @foreach ($posts as $post)
            <div>

                <a href="{{route('dashboard.show', ['post' => $post, 'user' => $post->user])}}">
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

</div>