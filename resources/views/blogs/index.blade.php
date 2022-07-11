<x-layout>
    @if (session('success'))
        <div class="alert atert-success text-center">{{ session('success') }}</div>
    @endif
    <x-hero />
    <x-blog-section :blogs="$blogs" />
    <x-subscribe-section />
</x-layout>
