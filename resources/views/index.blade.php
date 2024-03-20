@extends('layouts.base')

@section('title', 'РИЦ :: Главная')
@section('description', 'Главная страница РИЦ')

@section('main')

    <section class="text-gray-600 body-font">

        <div class="flex flex-col w-full px-5 mb-5">
            <h1 class="sm:text-4xl text-center text-3xl font-bold title-font mb-6 sm:mb-12 text-gray-700">
                Карта сайта
            </h1>
            <div class="entry-content space-y-4 lg:w-3/4 mx-auto text-left leading-normal sm:text-lg">
                <div>
                    <span class="font-bold">План издания учебной и учебно-методической литературы</span>
                    <ol>
                        <li><a href="">2022</a> <a href="">2021</a><a href="">2020</a></li>
                    </ol>
                </div>
                <div>
                    <span class="font-bold">В помощь автору</span>
                    <ol>
                        <li><a href="">Авторская редакция. Требования к оформлению</a></li>
                        <li><a href="">Формы заявок на тиражирование</a></li>
                        <li><a href="">Виды вузовского учебно-методического обеспечения</a></li>
                        <li><a href="">Краткий словарь издательских терминов</a></li>
                    </ol>
                </div>
                <div>
                    <span class="font-bold">Редакционно-издательский центр</span>
                    <ol>
                        <li><a href="">О нашем центре</a></li>
                        <li><a href="">Платные услуги</a></li>
                        <li><a href="">Контакты</a></li>
                    </ol>
                </div>
            </div>
        </div>

    </section>
@endsection
