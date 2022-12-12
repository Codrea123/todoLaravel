<!DOCTYPE html>
<html lang="">

<head>
    <title>Todo App</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#26295e] h-screen w-screen overflow-hidden">

    <h1 class="font-mono text-xl text-[#D1D7E0]">You are logged in as: {{Auth::user()->name}}</h1>

    <div class="my-12 text-center">
        <p class="text-[#D1D7E0] underline decoration-[#2f9693] underline-offset-8 drop-shadow-lg text-7xl font-mono -my-4">Todo app</p>
    </div>
    <div class="grid grid-cols-2 gap-80 content-start">

        <a href="{{route('tasks.create')}}" class="bg-gradient-to-br from-[#2f9693] to-[#802BB1] transition ease-in-out hover:scale-110 my-20 text-white font-bold rounded-full py-6 text-center mx-28">
            Create Task
        </a>

        <a href="{{route('tasks.index')}}" class="bg-gradient-to-br from-[#2f9693] to-[#802BB1] transition ease-in-out hover:scale-110 my-20 text-white font-bold rounded-full py-6 text-center mx-28">
            View All Tasks
        </a>
    </div>
</body>

</html>
