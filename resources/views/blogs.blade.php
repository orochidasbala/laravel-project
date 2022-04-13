<x-layout>

    <x-slot name="title">
        <title>All Blogs</title>
    </x-slot>

    @foreach ($blogs as $blog)

    <div class="{{$loop->odd ? 'bg-grey' : 'right_side'}}">
        <h1>
            <a href="blogs/{{$blog->slug }}">
                {{$blog->title}}
            </a>
        </h1>
        <div>
            <span style="color: white;">
                Public at - {{$blog->date}}
            </span><br>
            <span>
                {{$blog->intro}}
            </span>
        </div>
        <hr>
    </div>
    @endforeach

</x-layout>