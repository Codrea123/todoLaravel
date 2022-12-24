<html lang="">
<body class="bg-[#26295e] h-screen w-screen overflow-y-hidden">
@vite(['resources/css/app.css'])
<?php
    use Carbon\Carbon;
    ?>
<h1 class="mx-10 my-6 text-2xl text-[#D1D7E0] font-mono font-bold">{{count($tasks)-count($tasksCompleted)}} due tasks
    <br>
    {{count($tasksCompleted)}} completed tasks
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
                    <li class="font-mono font-bold">Due: {{Carbon::parse($task->reminder)->isoFormat('LLL')}}<br>({{Carbon::parse($task->reminder)->diffForHumans(Carbon::now())}} today)</li>

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
                        <form action="{{route('subTasks.store')}}" method="post">
                            @csrf
                            <input class="h-0 w-0" type="hidden" name="task_id" value="{{$task->id}}">
                            <input type="text" name="description">
                            <input class="w-0 h-0" type="hidden" name="completed" value="0">
                            <button type="submit"></button>
                        </form>
                    <br>
                    <div class="grid grid-cols-2 gap-16">
                        <form action="{{route('tasks.destroy',['task'=>$task])}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit"><img src="{{asset('/images/delete-512.png')}}" alt="Delete" class="w-8 h-8"></button>
                        </form>
                        <form action='{{route('tasks.update',['task' => $task])}}' method="post">
                            @csrf
                            <div class="text-right">
                                <button type="submit" class="">
                                    <img class="w-8 h-8" src="{{$task->completed ? asset('/images/check-white.png') : asset('images/check-green.png')}}">
                                </button>
                            </div>
                            <input type="hidden" name="user_id" value="{{Auth::id()}}">
                            <input class="w-0 h-0" type="hidden" name="title" value="{{$task->title}}"/>
                            <input class="w-0 h-0" type="hidden" name="description" value="{{$task->description}}"/>
                            <input class="w-0 h-0" type="hidden" name="reminder" value="{{$task->reminder}}"/>
                            <input class="w-0 h-0" type="hidden" name="completed" value="{{$task->completed ? 0:1}}">

                        </form>

                    </div>
                </div>
            </div>
        @endforeach
    </ul>
</body>
</html>
