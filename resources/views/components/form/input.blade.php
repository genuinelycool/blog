@props(['name', 'type' => 'text'])

{{-- <div class="mb-6"> --}}
<x-form.field>
    <x-form.label name="{{ $name }}" />
    {{-- <label class="block mb-2 upercase font-bold text-xs text-gray-700"
        for="{{ $name }}"
    >
        {{ ucwords($name) }}
    </label> --}}

    <input class="border border-gray-400 p-2 w-full"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old('$name') }}"
        required
    >

    <x-form.error name="{{ $name }}" />
    {{-- @error($name)
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror --}}
{{-- </div> --}}
</x-form.field>
