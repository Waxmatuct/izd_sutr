@extends('layouts.base')

@section('title', 'РИЦ :: Контакты')
@section('description', 'Контакты и сотрудники РИЦ СГУ')

@section('main')
    {{-- // TODO пересмотреть информацию --}}
    <section class="body-font">
        <div class="mb-10 flex w-full flex-col px-5">
            {{-- <h1 class="mb-6 text-center text-3xl font-bold sm:mb-12 sm:text-4xl">
                Контакты
            </h1>
            <div class="entry-content mx-auto space-y-4 leading-normal sm:text-lg lg:w-3/4">
                <div class="mb-10 flex w-full flex-col text-center">
                    <p class="mx-auto leading-relaxed lg:w-2/3"><strong>Адрес</strong>: г. Сочи, ул. Пластунская, 94, корпус
                        №1, каб. 113/1</p>
                    <p class="mx-auto leading-relaxed lg:w-2/3"><strong>Телефон/факс</strong>: <a href="tel: +78622682573">+7
                            (862) 268 25 73</a></p>
                    <p class="mx-auto leading-relaxed lg:w-2/3"><strong>E-mail</strong>: <a
                            href="mailto:izd-sgu@yandex.ru">izd-sgu@yandex.ru</a></p>
                    <p class="mx-auto leading-relaxed lg:w-2/3"><strong>Время работы</strong>: ПН-ЧТ с 9:00 до 18:00, ПТ с
                        9:00 до 17:00.</p>
                </div>
            </div> --}}
            <div>
                <h2 class="text-center text-2xl font-bold sm:text-3xl">Сотрудники РИЦ</h2>
            </div>
            <div class="mx-auto flex w-full flex-wrap">
                <div class="w-full p-4">
                    <div class="flex h-full flex-col items-center justify-center text-center">
                        <img alt="team"
                            class="mb-4 h-48 w-48 flex-shrink-0 rounded-full object-cover object-center sm:mb-0"
                            src="https://sutr.ru/upload/iblock/682/Pletnev.jpg">
                        <div class="mt-5 flex-grow">
                            <h2 class="title-font text-lg font-bold leading-snug">Плетнев<br> Дмитрий Витальевич</h2>
                            <h3 class="my-3 text-gray-500">Начальник РИЦ</h3>
                        </div>
                    </div>
                </div>
                <div class="w-full p-4">
                    <div class="flex h-full flex-col items-center justify-center text-center">
                        <img alt="team"
                            class="mb-4 h-48 w-48 flex-shrink-0 rounded-full object-cover object-center sm:mb-0"
                            src="{{ asset('/images/no-foto.jpg') }}">
                        <div class="mt-5 flex-grow">
                            <h2 class="title-font text-lg font-bold leading-snug">Карасевич<br> Татьяна Юрьевна </h2>
                            <h3 class="my-3 text-gray-500">Редактор I категории</h3>
                        </div>
                    </div>
                </div>
                <div class="w-full p-4">
                    <div class="flex h-full flex-col items-center justify-center text-center">
                        <img alt="team"
                            class="mb-4 h-48 w-48 flex-shrink-0 rounded-full object-cover object-center sm:mb-0"
                            src="{{ asset('/images/no-foto.jpg') }}">
                        <div class="mt-5 flex-grow">
                            <h2 class="title-font text-lg font-bold leading-snug">Шебин<br> Евгений Павлович</h2>
                            <h3 class="my-3 text-gray-500 dark:text-gray-400">Старший печатник</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
