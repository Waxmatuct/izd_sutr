@extends('layouts.base')

@section('title', 'РИЦ :: Контакты')

@section('main')

    <section class="text-gray-600 body-font">
        <div class="flex flex-col w-full mb-10">
            <h1 class="sm:text-4xl text-center text-3xl font-bold mb-6 sm:mb-12 text-gray-700">
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
            <div class="flex flex-wrap -m-4">
                <div class="p-4 lg:w-1/2">
                    <div
                        class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
                        <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4"
                            src="https://picsum.photos/200?random=1">
                        <div class="flex-grow sm:pl-8">
                            <h2 class="title-font font-medium text-lg text-gray-900">Дмитрий Плетнев</h2>
                            <h3 class="text-gray-500 mb-3">Начальник РИЦ</h3>
                            <p class="mb-4">DIY tote bag drinking vinegar cronut adaptogen squid fanny pack
                                vaporware.</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 lg:w-1/2">
                    <div
                        class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
                        <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4"
                            src="https://picsum.photos/200?random=2">
                        <div class="flex-grow sm:pl-8">
                            <h2 class="title-font font-medium text-lg text-gray-900">Татьяна Юрьевна Карасевич</h2>
                            <h3 class="text-gray-500 mb-3">Редактор</h3>
                            <p class="mb-4">DIY tote bag drinking vinegar cronut adaptogen squid fanny pack
                                vaporware.</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 lg:w-1/2">
                    <div
                        class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
                        <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4"
                            src="https://picsum.photos/200?random=3">
                        <div class="flex-grow sm:pl-8">
                            <h2 class="title-font font-medium text-lg text-gray-900">Евгений Шебин</h2>
                            <h3 class="text-gray-500 mb-3">Старший печатник</h3>
                            <p class="mb-4">DIY tote bag drinking vinegar cronut adaptogen squid fanny pack
                                vaporware.</p>
                        </div>
                    </div>
                </div>
                <div class="p-4 lg:w-1/2">
                    <div
                        class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
                        <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4"
                            src="https://picsum.photos/200?random=4">
                        <div class="flex-grow sm:pl-8">
                            <h2 class="title-font font-medium text-lg text-gray-900">Екатерина Шмонова</h2>
                            <h3 class="text-gray-500 mb-3">Документовед</h3>
                            <p class="mb-4">DIY tote bag drinking vinegar cronut adaptogen squid fanny pack
                                vaporware.</p>
                        </div>
                    </div>
                </div>
            </div>

        @endsection
