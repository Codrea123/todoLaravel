@extends('layouts.app')
@section('content')
    <div>
        <?php
        use Carbon\Carbon;
        ?>

        <h1 class="text-white">
            @if($category)
                Tasks with category: {{$category->name}}
            @endif
        </h1>
        <ul class="grid grid-cols-3 gap-2">

            @foreach($tasks as $task)
                <div class="{{$task->completed ?'bg-green-500':'bg-[#D1D7E0]'}} mx-6 drop-shadow-lg rounded-lg">
                    <a href="{{route('tasks.edit',['task'=>$task])}}" class="absolute mx-2 my-2">
                        <img src="{{asset('/images/edit-button.png')}}" alt="Edit" class="w-8 h-8">
                    </a>
                    <div class="mx-4 ">
                        <li class="text-center font-mono font-bold">{{$task->title}}</li>
                        <div class="overflow-auto h-28 my-6">
                            <li class="text-left font-mono my-6">{{$task->description}}</li>
                        </div>
                        <li class="font-mono font-bold">Due: {{Carbon::parse($task->reminder)->isoFormat('LLL')}}<br>({{Carbon::parse($task->reminder)->diffForHumans()}})</li>

                        <br>
                        <br>
                        <div class="overflow-auto h-28">
                            @foreach($task->subTasks as $subTask)
                                <div class="flex">
                                    <form action="{{route('subTasks.toggleComplete',['subTask'=>$subTask,'task'=>$task])}}" method="post">
                                        @csrf
                                        <input class="h-0 w-0" type="hidden" name="user_id" value="{{Auth::id()}}">
                                        <input class="h-0 w-0" type="hidden" name="task_id" value="{{$task->id}}">
                                        <input class="h-0 w-0" type="hidden" name="description" value="{{$subTask->description}}">
                                        <input class="h-0 w-0" type="hidden" name="completed" value="{{$subTask->completed ? 0:1}}">
                                        <button type="submit" class="rounded-lg px-6 text-white {{$subTask->completed ? 'bg-green-500' : 'bg-gray-500'}}">{{$subTask->description}}</button>
                                    </form>
                                    <form action="{{route('subTasks.destroy',['subTask'=>$subTask])}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit"><img src="{{asset('/images/delete-512.png')}}" alt="Delete" class="w-6 h-6"></button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded toggle">Add subtask</button>

                        <div class="grid grid-cols-2 gap-16">
                            <form action="{{route('tasks.destroy',['task'=>$task])}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit"><img src="{{asset('/images/delete-512.png')}}" alt="Delete" class="w-8 h-8"></button>
                            </form>
                            <form action='{{route('tasks.toggle',['task' => $task])}}' method="post">
                                @csrf
                                <div class="text-right">
                                    <button type="submit" class="">
                                        <img class="w-8 h-8" src="{{$task->completed ? asset('/images/check-white.png') : asset('images/check-green.png')}}">
                                    </button>
                                </div>
                                <input type="hidden" name="toggle" value="1">
                                <input class="w-0 h-0" type="hidden" name="completed" value="{{$task->completed ? 0:1}}">
                            </form>
                        </div>
                        <label for="category_id">Category:</label><br>
                            <select name="category_id" id="category_id" class="category-select">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$task->category?->id == $category->id ? "selected" : " "}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>
    @include('partials.modals.add_subtask_modal')

@endsection
<script>

    document.addEventListener('DOMContentLoaded',function (){
        document.querySelector('.category-select').addEventListener('change', (e) => {
            const task_id = e.target.parentNode.parentNode.parentNode.querySelector('input[name="task_id"]').value
            fetch('/tasks/change-category/' + task_id, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    category_id: e.target.value,

                })
            }).then(res => res.json())
                .then(data => console.log(data))
        });
    });


</script>
