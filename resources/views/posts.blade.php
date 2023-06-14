{{-- <x-layout content="Hello there"> --}}
{{-- <x-layout>
    <x-slot name="content">
        Hello again
    </x-slot>
</x-layout> --}}



<x-layout>
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>

            <div>
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach
</x-layout>
