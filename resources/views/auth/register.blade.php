<head>
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<div class="">
    <div class="">
        <div class="">
            <div class="">
                <div class="">{{ __('Register') }}</div>

                <div class="">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="">
                            <label for="name" class="">{{ __('Name') }}</label>

                            <div class="">
                                <input id="name" type="text" required autofocus>

                            </div>
                        </div>

                        <div class="">
                            <label for="email"  >{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email" required >
                            </div>
                        </div>

                        <div class="">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" name="password" required >

                            </div>
                        </div>

                        <div class="">
                            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" required >
                            </div>
                        </div>

                        <div class="">
                            <div class="">
                                <button type="submit" class="">
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
