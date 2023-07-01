@props(['name'])

{{-- <div class="mb-6"> --}}
<x-form.field>
    <x-form.label name="{{ $name }}" />
    {{-- <label class="block mb-2 upercase font-bold text-xs text-gray-700"
        for="{{ $name }}"
    >
        {{ ucwords($name) }}
    </label> --}}

    <textarea class="border border-gray-400 p-2 w-full"
        name="{{ $name }}"
        id="{{ $name }}"
        required
    >{{ old($name) }}</textarea>

    <x-form.error name="{{ $name }}" />
    {{-- @error('{{ $name }}')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror --}}
{{-- </div> --}}
</x-form.field>
