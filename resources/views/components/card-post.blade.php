@props(['post'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    @if($post->image)
        <img src="{{ $post->image->url }}" alt=""
            class="w-full h-72 object-cover object-center"
        >
    
    @endif

    <div class="px-6 py-6">                    

        <h1 class="font-bold text-xl mb-2">
            <a href="{{ route('post.show' , $post) }}">
                {{ $post->title }}
            </a>
        </h1>

        <div class="text-gray-700 text-base">
            {!! $post->extract !!}
        </div>

        <div class="px-6 pt-4 pb-2">
            @foreach ($post->tags as $tag)
            <a href="{{ route('post.tags', $tag) }}" class="inline-block px-3 px-1 mr-2 h-6 bg-gray-200 text-gray-700 rounded-full">{{ $tag->name }}</a>
            @endforeach
        </div>

    </div>


</article>