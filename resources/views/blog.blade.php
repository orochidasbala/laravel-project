<x-layout>
    <x-slot name="title">
        <title>
            {{$blog->title}}
        </title>
    </x-slot>
    <h1>
        {{$blog->title}}
    </h1>
    <p>
        {{$blog->body}}
    </p>
    <x-homepage/>
</x-layout>