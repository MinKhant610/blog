<x-layout>
    @if (session('success'))
    <div class="alert alert-success text-center">
       {{session('success')}}
    </div>
    @endif
    <!-- hero section -->
    <x-hero></x-hero>

    <!-- blogs section -->
    {{--  currentCategory ?? null = $currentCategory ? currentCategory' : null --}}
    <x-blogs-section
    :blogs="$blogs">
    </x-blogs-section>
    <!-- subscribe new blogs -->
        <x-subscribe></x-subscribe>
</x-layout>
