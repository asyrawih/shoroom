<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-main h-screen antialiased leading-none">
    <div class="flex flex-col">
        @if (Route::has('login'))
            <div class="absolute top-0 right-0 mt-4 mr-4">
                @auth
                    <a href="{{ url('/home') }}"
                        class="no-underline hover:underline text-sm font-bold text-secondary uppercase">{{ __('Home') }}</a>
                @else
                    <a href="{{ route('login') }}"
                        class="no-underline hover:underline text-md font-bold text-secondary uppercase pr-6">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Register') }}</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="container mx-auto my-20">
            <div class="bg-gradient-to-tr from-gray-600  to-secondary   border-4 border-main shadow-lg h-60 rounded-md">
                <div class="flex flex-col justify-center">
                    <span class="text-white mt-20 mb-3 font-bold tracking-wider mx-auto text-5xl">Selamat Datang</span>
                    <span class="text-white text-4xl mx-auto">{{ config('app.name') }}</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
