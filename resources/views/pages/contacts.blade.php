@extends('layouts.base')

@section('title', 'РИЦ :: Контакты')
@section('description', 'Контакты и сотрудники РИЦ СГУ')

@section('main')
    {{-- // TODO пересмотреть информацию --}}
    <section class="body-font">
        <div class="flex flex-col w-full px-5 mb-10">
            <h1 class="sm:text-4xl text-center text-3xl font-bold mb-6 sm:mb-12">
                Контакты
            </h1>
            <div class="entry-content space-y-4 lg:w-3/4 mx-auto leading-normal sm:text-lg">
                <div class="flex flex-col text-center w-full mb-10">
                    <p class="lg:w-2/3 mx-auto leading-relaxed"><strong>Адрес</strong>: г. Сочи, ул. Пластунская, 94, корпус
                        №1, каб. 113/1</p>
                    <p class="lg:w-2/3 mx-auto leading-relaxed"><strong>Телефон/факс</strong>: <a href="tel: +78622682573">+7
                            (862) 268 25 73</a></p>
                    <p class="lg:w-2/3 mx-auto leading-relaxed"><strong>E-mail</strong>: <a
                            href="mailto:izd-sgu@yandex.ru">izd-sgu@yandex.ru</a></p>
                    <p class="lg:w-2/3 mx-auto leading-relaxed"><strong>Время работы</strong>: ПН-ЧТ с 9:00 до 18:00, ПТ с
                        9:00 до 17:00.</p>
                </div>
            </div>
            <div>
                <h2 class="text-2xl sm:text-3xl text-center font-bold">Сотрудники РИЦ</h2>
            </div>
            <div class="flex flex-wrap w-full mx-auto">
                <div class="p-4 w-full">
                    <div class="h-full flex flex-col items-center justify-center text-center">
                        <img alt="team"
                            class="flex-shrink-0 rounded-full w-48 h-48 object-cover object-center sm:mb-0 mb-4"
                            src="https://sutr.ru/upload/iblock/682/Pletnev.jpg">
                        <div class="flex-grow mt-5">
                            <h2 class="title-font font-bold text-lg leading-snug">Плетнев<br> Дмитрий Витальевич</h2>
                            <h3 class="text-gray-500 my-3">Начальник РИЦ</h3>
                        </div>
                    </div>
                </div>
                <div class="p-4 w-full">
                    <div class="h-full flex flex-col items-center justify-center text-center">
                                                <img alt="team"
                            class="flex-shrink-0 rounded-full w-48 h-48 object-cover object-center sm:mb-0 mb-4"
                            src="{{ asset('/images/no-foto.jpg') }}">
                        <div class="flex-grow mt-5">
                            <h2 class="title-font font-bold text-lg leading-snug">Карасевич<br> Татьяна Юрьевна </h2>
                            <h3 class="text-gray-500 my-3">Редактор I категории</h3>
                        </div>
                    </div>
                </div>
                <div class="p-4 w-full">
                    <div class="h-full flex flex-col items-center justify-center text-center">
                                                <img alt="team"
                            class="flex-shrink-0 rounded-full w-48 h-48 object-cover object-center sm:mb-0 mb-4"
                            src="{{ asset('/images/no-foto.jpg') }}">
                        <div class="flex-grow mt-5">
                            <h2 class="title-font font-bold text-lg leading-snug">Шебин<br> Евгений Павлович</h2>
                            <h3 class="text-gray-500 dark:text-gray-400 my-3">Старший печатник</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
