<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="yandex-verification" content="1e910acb743c310a" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description')">

    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @routes
</head>

<body class="h-dvh bg-gray-100 font-sans text-gray-700 antialiased dark:bg-gray-800 dark:text-gray-400">

    <div id="wrapper" class="flex min-h-full flex-col">
        <div id="app" class="flex-[1_0_auto]">
            <header>
                <navbar-component></navbar-component>
                {{-- @include('partials.navigation.nav') --}}
            </header>
            <div class="container mx-auto mt-32 flex flex-col md:mt-32 md:px-10">
                @yield('main')
            </div>
        </div>
        <footer
            class="mx-auto mt-10 w-full flex-[0_0_auto] bg-white p-5 text-center text-sm text-gray-600 shadow-[0_-4px_6px_rgba(0,0,0,0.1)] dark:text-gray-400 md:text-base">
            <p>© 2020–{{ date('Y') }} Редакционно-издательский центр<br> ФГБОУ ВО «Сочинский государственный
                университет»</p>
            <small class="mt-2">
                Разработка приложения - <a href="mailto:pletnevsochi@yandex.ru">Дмитрий Плетнев</a>
            </small>
        </footer>
    </div>
    @auth
        <script>
            window.authUser = {!! json_encode(Auth::user()) !!};
        </script>
    @endauth
    @guest
        <script>
            window.authUser = null;
        </script>
    @endguest

</body>

</html>
