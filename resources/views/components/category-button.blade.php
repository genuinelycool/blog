@props(['category'])
{{-- give us the category object and we will grab what we need --}}

<a href="/categories/{{ $category->slug }}"
    class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
    style="font-size: 10px"
>{{ $category->name }}</a>
