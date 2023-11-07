<x-layout>
    <!-- hero section -->
    <x-hero></x-hero>

    <!-- blogs section -->
    {{--  currentCategory ?? null = $currentCategory ? currentCategory' : null --}}
    <x-blogs-section
    :blogs="$blogs"
    :categories="$categories"
    :currentCategory="$currentCategory ?? null">
    </x-blogs-section>
    <!-- subscribe new blogs -->
        <x-subscribe></x-subscribe>
</x-layout>
