@extends('layouts.app')
@section('content')
    <div>
        <h1>Profile</h1>
        {{session()->has('success') ? session()->get('success') : ''}}
        {{session()->has('error') ? session()->get('error') : ''}}
        <form action="{{route('profile.update')}}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{auth()->user()->name}}">
                @if($errors->has('name'))
                    <p class="text-danger">{{$errors->first('name')}}</p>
                @endif
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{auth()->user()->email}}">
                @if($errors->has('email'))
                    <p class="text-danger">{{$errors->first('email')}}</p>
                @endif
            </div>
            <div>
                <label for="toggle-password">Change password?</label>
                <input type="checkbox" class="toggle-password" id="toggle-password">
            </div>
            <div class="password-container hidden">
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                    @if($errors->has('password'))
                        <p class="text-danger">{{$errors->first('password')}}</p>
                    @endif
                </div>
                <div>
                    <label for="password_confirmation">Password confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation">
                    @if($errors->has('password_confirmation'))
                        <p class="text-danger">{{$errors->first('password_confirmation')}}</p>
                    @endif
                </div>
            </div>
            <div>
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded',function (){
        const togglePassword = document.querySelector('.toggle-password');
        const container = document.querySelector('.password-container');
        togglePassword.addEventListener('change', function (e) {
            container.classList.toggle('hidden');
        })
    })
</script>
