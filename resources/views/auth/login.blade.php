<head>
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body class="bg-[#26295e] overflow-hidden">
<div>
    <div>
        <div>
            <div class="flex flex-column h-screen overflow-hidden justify-around items-center">
                <div class="w-2/5 h-3/5 bg-white items-center flex rounded-lg shadow-2xl">
                    <div class="w-full text-center">
                        <p class="text-5xl font-mono">Log Into Your account</p>
                        <form method="POST" action="{{ route('login') }}" class="items-center flex flex-col space-y-4">
                            @csrf

                            <div>
                                <div>
                                    <svg class="absolute ml-2 mt-[12px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input class="bg-transparent rounded-full w-72 h-12 text-xl pl-10 text-black-900" placeholder="Email address" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                </div>
                                @if($errors->has('email'))
                                    <p class="text-danger">{{$errors->first('email')}}</p>
                                @endif
                            </div>

                            <div>
                                <div>
                                    <svg class="absolute ml-2 mt-[12px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input class="bg-transparent rounded-full w-72 h-12 text-xl pl-10" placeholder="Password" id="password" type="password" name="password" required autocomplete="new-password">
                                </div>

                                @if($errors->has('password'))
                                    <p class="text-danger">{{$errors->first('password')}}</p>
                                @endif
                            </div>

                            <div>
                                <div>
                                    <button type="submit" class="shadow-2xl text-xl font-mono font-bold p-6 rounded-full text-[#D1D7E0] bg-[#26295E] px-20 -py-6">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div>
                    <p class="text-xl font-mono text-[#D1D7E0]">Don't have an account?</p>
                    <div class="my-12">
                        <a class="shadow-2xl text-xl font-mono font-bold p-6 rounded-full text-[#26295E] bg-[#D1D7E0] px-20 -py-6"  href="{{route('register')}}">Register!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
