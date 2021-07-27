<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet"> 

        <!-- Styles -->
        <style>

        </style>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
    </head>
    <body class="font-sans antialiased">
		
		<header>
			@include('partials.navigation.nav')
		</header>

        <div class="flex flex-col container mx-auto px-5 mt-32 md:mt-32 md:px-10">
			
			@yield('main')
			
        </div>

        <footer class="flex flex-col items-center container w-full text-center mx-auto my-10 text-gray-500 px-5">
            <p>© 2021, Редакционно-издательский центр<br> ФГБОУ ВО «Сочинский государственный университет»</p>
            <small>Разработка сайта - <a href="mailto:pletnevsochi@yandex.ru">Дмитрий Плетнев</a></small>
        </footer>    
    
    </body>
</html>
