@extends('layouts.app')
@section('content')
    <h1 class="font-mono text-xl text-[#D1D7E0] font-bold">Profile</h1><br><br>
    <div class="flex flex-row justify-around">
        {{session()->has('success') ? session()->get('success') : ''}}
        {{session()->has('error') ? session()->get('error') : ''}}
        <form action="{{route('profile.update')}}" method="POST" class="mx-12">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="font-mono text-xl text-[#D1D7E0] font-bold">Name</label><br>
                <input class="bg-gray-500 font-mono text-xl text-[#ffffff] font-bold" type="text" name="name" id="name" value="{{auth()->user()->name}}">
                @if($errors->has('name'))
                    <p class="text-danger">{{$errors->first('name')}}</p>
                @endif
            </div>
            <div>
                <label for="email" class="font-mono text-xl text-[#D1D7E0] font-bold">Email</label><br>
                <input class="bg-gray-500 font-mono text-xl text-[#ffffff] font-bold" type="email" name="email" id="email" value="{{auth()->user()->email}}">
                @if($errors->has('email'))
                    <p class="text-danger">{{$errors->first('email')}}</p>
                @endif
            </div>
            <div>
                <label class="font-mono text-xl text-[#D1D7E0] font-bold" for="toggle-password" >Change password?</label>
                <input type="checkbox" class="toggle-password" id="toggle-password">
            </div>
            <div class="password-container hidden">
                <div>
                    <label class="font-mono text-xl text-[#D1D7E0] font-bold" for="password">Password</label><br>
                    <input class="bg-gray-500 font-mono text-xl text-[#ffffff] font-bold" type="password" name="password" id="password">
                    @if($errors->has('password'))
                        <p class="text-danger">{{$errors->first('password')}}</p>
                    @endif
                </div>
                <div>
                    <label class="font-mono text-xl text-[#D1D7E0] font-bold" for="password_confirmation">Password confirmation</label><br>
                    <input class="bg-gray-500 font-mono text-xl text-[#ffffff] font-bold" type="password" name="password_confirmation" id="password_confirmation">
                    @if($errors->has('password_confirmation'))
                        <p class="text-danger">{{$errors->first('password_confirmation')}}</p>
                    @endif
                </div>
            </div>
            <div>
                <button type="submit" class="inline-block align-middle bg-[#2f9693] transition ease-in-out hover:scale-110 my-6 font-mono text-white font-bold rounded-full text-center px-12 py-4">Update</button>
            </div>
        </form>
        @if(auth()->user()->is_admin)

            <div class="canvas-container">
                <p class="font-mono text-xl text-[#D1D7E0] font-bold">Average task to user ratio:</p>
                <canvas id="chart">

                </canvas>
            </div>
        @endif
    </div>

@endsection
<script>

    document.addEventListener('DOMContentLoaded',function (){
        const ctxContainer = document.querySelector('.canvas-container');
        ctxContainer.style.width = "300px";
        ctxContainer.style.height = "300px";
        const ctx = document.getElementById('chart');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Users', 'Tasks'],
                datasets: [{
                    label: '# of tasks per user',
                    data: [{{$numberOfUsers}}, {{$numberOfTasks/$numberOfUsers}}],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {

                }
            }
        });
        const togglePassword = document.querySelector('.toggle-password');
        const container = document.querySelector('.password-container');
        togglePassword.addEventListener('change', function (e) {
            container.classList.toggle('hidden');
        })
    })
</script>
