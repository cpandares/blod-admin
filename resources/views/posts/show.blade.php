<x-app-layout>

    <div class="container py-8">
        
        <h1 class="text-4xl font-bold text-gray-600">{{ $post->title }}</h1>

        <div class="text-lg text-gray-500 mb-2">
            {!! $post->extract !!}
        </div>
         
        {{-- 3 columnas,  --}}
        <div class="grid grid-cols-1 md:grid-col-2 lg:grid-cols-3 gap-6">

            {{-- Contenido Principal --}}
            <div class="md:col-span-2">
                <figure>
                    @if($post->image)
                    <img 
                        class="w-full h-80 object-cover object-center"
                        src="{{ $post->image->url }}" 
                        alt=""
                        >
                   
                    @endif
                </figure>

                <div    
                    class="text-base text-gray-500 mt-4"
                >
                    {!! $post->body !!}
                </div>
            </div>
                {{-- Posts Relacionados --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">More post {{ $post->category->name }}</h1>
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a 
                            class="flex"
                            href="{{ route('post.show', $similar) }}">
                            @if($similar->image)
                            <img 
                                class="w-full h-80 object-cover object-center"
                                src="{{ $similar->image->url }}" 
                                alt=""
                                >
                        
                            @endif
                                <span class="ml-2 text-gray-600">
                                    {{ $similar->title }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>
    </div>

</x-app-layout>