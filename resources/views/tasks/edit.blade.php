<html lang="">
@vite(['resources/css/app.css'])
<body  class="bg-[#26295E] h-screen w-screen overflow-hidden">
<div class="my-12 text-left mx-12">
    <h1 class="text-[#D1D7E0] drop-shadow-lg text-5xl font-mono">Edit "{{$task->title}}"</h1>
</div>
    <form action='{{route('tasks.update',['task' => $task])}}' method="post" class="mx-12">
        @csrf
        <label class="font-mono text-xl text-[#D1D7E0] font-bold">Title:<br> </label><input type="text" name="title" value="{{$task->title}}" class="bg-gray-500 font-mono text-xl text-[#ffffff] font-bold" required/><br/><br/>
        <label class="font-mono text-xl text-[#D1D7E0] font-bold">Description:<br></label><textarea type="text" name="description" class="bg-gray-500 font-mono text-xl text-[#ffffff] font-bold" required>{{$task->description}}</textarea><br/><br/>
        <label class="font-mono text-xl text-[#D1D7E0] font-bold">Reminder:<br></label><input type="datetime-local" name="reminder" value="{{$task->reminder}}" class="bg-gray-500 font-mono text-xl text-[#ffffff] font-bold" required/><br/><br/>
        <input type="hidden" name="completed" value="{{$task->completed}}">
        <button type="submit" class="inline-block align-middle bg-[#2f9693] transition ease-in-out hover:scale-110 my-6 font-mono text-white font-bold rounded-full text-center px-12 py-4">
            <span class="text-2xl">Edit</span>
            <i class="fa fa-send-o scale-150 ml-2 font-size-20"></i>
        </button>
    </form>
</body>
</html>
