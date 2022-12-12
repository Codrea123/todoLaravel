<html>
<head>
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<h1>
    {{Auth::check()? Auth::user()->name:'Nu esti logat'}}
</h1>
<div class="">
    <div class="">
        <div class="">
            <div class="">
                <div class="">{{ __('Login') }}</div>

                <div class="">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="">
                            <label for="email" class="">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="" name="email" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="">
                            <div class="">
                                <div class="">
                                    <input class="" type="checkbox" name="remember" id="remember">

                                    <label class="" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div class="">
                                <button type="submit" class="">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</html>

