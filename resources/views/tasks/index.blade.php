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
                <div class="{{$task->completed ?'bg-green-500':'bg-[#D1D7E0]'}} mx-6 drop-shadow-lg rounded-lg task">
                    <input class="h-0 w-0 task-id" type="hidden" name="task_id" value="{{$task->id}}">
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

                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded toggle">Add subtask</button>


                        <label for="category_id">Category:</label><br>
                            <select name="category_id" id="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg mb-4 category-select">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$task->category?->id == $category->id ? "selected" : " "}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                    </div>
                </div>
            @endforeach
            @foreach($tasks as $task)
                    @include('partials.modals.add_subtask_modal')
            @endforeach
        </ul>
    </div>
@endsection
<script>


    document.addEventListener('DOMContentLoaded',function (){
        //get all the buttons
        let buttons = document.querySelectorAll('.toggle');
        //get all the modals
        let modals = document.querySelectorAll('.modal');
        //get all the close buttons
        let closeButtons = document.querySelectorAll('.close');
        //get all the tasks
        let tasks = document.querySelectorAll('.task');
        //loop through the buttons
        buttons.forEach((button, i) => {
            button.addEventListener('click', () => {
                modals[i].classList.toggle('hidden');
            })
        })
        closeButtons.forEach((button, i) => {
            button.addEventListener('click', () => {
                modals[i].classList.toggle('hidden');
            })
        })

        tasks.forEach((task, i) => {
            task.querySelector('.category-select').addEventListener('change', (e) => {
                    let task_id = task.querySelector('.task-id').value;
                    console.log(task_id);
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
        })


    });


</script>
