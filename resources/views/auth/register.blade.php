<head>
    @vite('resources/css/app.css')
    <title>Register</title>
</head>
<div>
    <div>
        <div>
            <div>
                <div>{{ __('Register') }}</div>

                <div class="m-52">
                    <form method="POST" action="{{ route('register') }}" class="flex flex-col space-y-4">
                        @csrf

                        <div>
                            <div>
                                <svg class="absolute ml-2 mt-[12px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <input class="rounded-full w-72 h-12 text-xl pl-10" placeholder="Name"  id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div>
                            <div>
                                <svg class="absolute ml-2 mt-[12px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                <input class="rounded-full w-72 h-12 text-xl pl-10 text-black-900" placeholder="Email address" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>

                        <div>
                            <div>
                                <svg class="absolute ml-2 mt-[12px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                <input class="rounded-full w-72 h-12 text-xl pl-10" placeholder="Password" id="password" type="password" name="password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div>
                            <div>
                                <svg class="absolute ml-2 mt-[12px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                <input class="rounded-full w-72 h-12 text-xl pl-10" placeholder="Confirm password" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div>
                            <div>
                                <button type="submit">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
