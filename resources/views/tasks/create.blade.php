<html lang="">
<head>
    <title>CreateToDo</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg-[#26295E] h-screen w-screen overflow-hidden">
<div class="">
    <div class="my-12 text-left mx-12">
        <h1 class="text-[#D1D7E0] drop-shadow-lg text-5xl font-mono">Create a new Task</h1>
    </div>
    <div class="">
        <form action='{{route('tasks.store')}}' method="POST" class="mx-12">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
            <label class="font-mono text-xl text-[#D1D7E0] font-bold">Title:<br/> </label><input type="text" name="title" placeholder="Title" class="bg-gray-500 font-mono text-xl text-[#ffffff] font-bold" required/><br/><br/>
            <label class="font-mono text-xl text-[#D1D7E0] font-bold">Description:</label> <br><textarea type="text" name="description" placeholder="Description" class="bg-gray-500 font-mono text-xl text-[#ffffff] font-bold" required></textarea><br/><br/>
            <label class="font-mono text-xl text-[#D1D7E0] font-bold">Date of reminder(leave blank for no reminder): </label><br><input type="datetime-local" name="reminder" class="bg-gray-500 font-mono text-xl text-[#ffffff] font-bold" required/><br/><br/>
            <button type="submit" class="inline-block align-middle bg-[#2f9693] transition ease-in-out hover:scale-110 my-6 font-mono text-white font-bold rounded-full text-center px-12 py-4">
                <span class="text-2xl">Create</span>
                <i class="fa fa-send-o scale-150 ml-2 font-size-20"></i>
            </button>
        </form>
    </div>
</div>
</body>
</html>
