<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-main h-screen antialiased leading-none">
    <div id="app">
        <nav class="bg-main  mb-8 py-6 shadow-lg">
            <div class="container mx-auto px-6 md:px-0">
                <div class="flex items-center justify-center">
                    <div class="mr-6">
                        <a href="{{ url('/') }}" class="text-lg font-bold shadow text-secondary no-underline">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                    <div class="flex-1 text-right">
                        @guest
                            {{-- <a
                                class="no-underline hover:underline font-bold text-gray-100 text-sm p-3"
                                href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="no-underline hover:underline text-gray-300 text-sm p-3"
                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif --}}
                        @else
                            <span class="font-bold text-secondary text-sm pr-4">{{ auth()->user()->name }}(
                                {{ auth()->user()->jabatan }} )</span>
                            <router-link :to="{name : 'barcode'}">
                                <span class="font-bold text-secondary text-sm pr-4">Barcode</span>
                            </router-link>
                            <a href="{{ route('logout') }}" class="no-underline hover:underline text-secondary text-sm p-3"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
</body>

</html>
