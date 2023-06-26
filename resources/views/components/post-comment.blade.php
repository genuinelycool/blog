@props(['comment'])

<x-panel class="bg-gray-50">
    {{-- <article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4"> --}}
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{ $comment->id }}" alt="" width="60" height="60" class="rounded-xl">
        </div>

        <div>
            <header class="mb-4">
                {{-- careful about eager loading, since we r using relationships here --}}
                <h3 class="font-bold">{{ $comment->author->username }}</h3>

                <p class="text-xs">
                    Posted
                    <time>{{ $comment->created_at }}</time>
                </p>
            </header>

            <p>
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-panel>
