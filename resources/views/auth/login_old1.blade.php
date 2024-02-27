<!DOCTYPE html>
<html lang="en" class="form-screen">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Issue Tracking</title>

    <!-- Tailwind is included -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css?v=1628755089081')}}">

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png"/>
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6"/>

    <meta name="description" content="Admin One - free Tailwind dashboard">



    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'UA-130795909-1');
    </script>

</head>
<body>

<div id="app">

    <section class="section main-section">

        <div class="card">
            <header class="card-header" style=" justify-content: center; display:block align-items: center;">
                <img width="10%" src="{{asset('img/logo-jjm.svg')}}" style="padding-top:20px "/>
            </header>

            <header class="card-header" style=" justify-content: center; display:block align-items: center;">
                <b>ISSUE TRACKING SYSTEM</b>
            </header>
            <div class="card-content">
                <x-jet-validation-errors class="mb-4" style="color: red" />
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="field spaced">
                        <label class="label">Login</label>
                        <div class="control icons-left">
                            <input class="input" type="text" name="username" :value="old('username')" required
                                   autocomplete="username" placeholder="Username">
                            <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                        </div>
                        <p class="help">
                            Please enter your login
                        </p>
                    </div>

                    <div class="field spaced">
                        <label class="label">Password</label>
                        <p class="control icons-left">
                            <input class="input" type="password" name="password" required
                                   autocomplete="current-password" placeholder="Password">
                            <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                        </p>
                        <p class="help">
                            Please enter your password
                        </p>
                    </div>

                    <div class="field spaced">
                        <div class="control">
                            <label class="checkbox"><input type="checkbox" name="remember" value="1" checked>
                                <span class="check"></span>
                                <span class="control-label">Remember</span>
                            </label>
                            <button type="submit" class="button blue" style="float: right">
                                Login
                            </button>
                        </div>
                    </div>
{{--                    @if (Route::has('password.request'))--}}
{{--                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--                            {{ __('Forgot your password?') }}--}}
{{--                        </a>--}}
{{--                    @endif--}}
                    <hr>

                    <div class="field grouped">
                        <div class="control">


                        </div>
                        <div style="float: right">
                            Don't have an account?
                            <a href="{{route('register')}}" style="color: #2563eb">
                                Register
                            </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </section>


</div>

<!-- Scripts below are for demo only -->
<script type="text/javascript" src="{{asset('assets/js/main.min.js?v=1628755089081')}}"></script>


<script>
    !function (f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function () {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '658339141622648');
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1"/></noscript>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

</body>
</html>
