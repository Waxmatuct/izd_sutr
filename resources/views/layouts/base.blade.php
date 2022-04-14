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

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('chartjs')

</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-400">

    <header>
        @include('partials.navigation.nav')
    </header>

    <div class="flex flex-col container mx-auto mt-32 md:mt-32 md:px-10">
        @yield('main')
    </div>

    <footer
        class="flex flex-col items-center container w-full text-sm md:text-base text-center mx-auto my-10 text-gray-600 dark:text-gray-400 px-5">
        <p>© 2020–{{ date('Y') }} Редакционно-издательский центр<br> ФГБОУ ВО «Сочинский государственный
            университет»</p>
        <small class="mt-7">
            Разработка приложения - <a href="mailto:pletnevsochi@yandex.ru">Дмитрий Плетнев</a>
        </small>
    </footer>

</body>

</html>
