@extends('layouts.app')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <div class="text-3xl font-bold">Categories</div>
                        <a href="{{route('categories.create')}}" class="text-3xl font-bold">+</a>
                    </div>
                    <div class="flex flex-wrap -mx-1 lg:-mx-4">
                        @foreach($categories as $category)
                            <div class="my-1 px-1 w-full lg:my-4 lg:px-4 lg:w-1/4">
                                <article class="overflow-hidden rounded-lg shadow-lg">
                                    <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                        <h1 class="text-lg flex flex-row justify-between w-full">
                                            <a class="no-underline hover:underline text-black" href="{{route('categories.edit', ['category'=>$category])}}">
                                                {{$category->name}}
                                            </a>
                                            {{--make me a delete button for category model--}}
                                            <form action="{{route('categories.destroy', ['category'=>$category])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><img src="{{asset('/images/delete-512.png')}}" alt="Delete" class="w-8 h-8"></button>
                                            </form>
                                        </h1>
                                    </header>

                                    <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                        <a class="flex items-center no-underline hover:underline text-black" href="{{route('tasks.index') . '?category_id=' . $category->id}}">
                                            <p class="ml-2 text-sm">
                                                {{$category->tasks ? $category->tasks->count() : '0'}} Tasks
                                            </p>
                                        </a>
                                    <div class="flex flex-column">
                                        <ul>
                                            @foreach($category->tasks as $task)
                                                <li>{{$task->description}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    </footer>
                                </article>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
