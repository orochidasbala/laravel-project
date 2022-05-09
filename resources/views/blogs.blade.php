<x-layout>

    <x-slot name="title">
        <title>All Blogs</title>
    </x-slot>

    @foreach ($blogs as $blog)

    <div class="{{$loop->odd ? 'bg-grey' : 'right_side'}}">
        <h1>
            <a href="blogs/{{$blog->slug}}">
                {{$blog->title}}
            </a>
        </h1>
        <a href="/user/{{$blog->author->username}}">Author : {{$blog->author->name}}</a>
        <p>
            <a href="/categories/{{$blog->category->slug}}">{{$blog->category->name}}</a>
        </p>
        <div>
            <p style="color: white;">
                Public at - {{$blog->created_at->diffForHumans()}} [upated at - {{$blog->updated_at->diffForHumans()}}]
            </p>
            <span>
                {{$blog->intro}}
            </span>
        </div>
        <hr>
    </div>
    @endforeach
    <x-footer />

</x-layout>