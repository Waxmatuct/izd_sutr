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
                    <p class="lg:w-2/3 mx-auto leading-relaxed"><strong>Адрес</strong>: г. Сочи, ул. Пластунская, 94, корпус №1, каб. 113/1</p>
                    <p class="lg:w-2/3 mx-auto leading-relaxed"><strong>Телефон/факс</strong>: <a href="tel: +78622682573">+7 (862) 268 25 73</a></p>
                    <p class="lg:w-2/3 mx-auto leading-relaxed"><strong>E-mail</strong>: <a href="mailto:izd-sgu@yandex.ru">izd-sgu@yandex.ru</a></p>
                    <p class="lg:w-2/3 mx-auto leading-relaxed"><strong>Время работы</strong>: ПН-ЧТ с 9:00 до 18:00, ПТ с 9:00 до 17:00.</p>
                </div>
                <div class="flex flex-wrap -m-2 text-sm">
                    <div class="p-2 lg:w-1/4 md:w-1/2 w-full">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                            <img alt="team"
                                class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                src="https://picsum.photos/100?random=1">
                            <div class="flex-grow">
                                <h2 class="text-gray-900 title-font font-medium">Дмитрий Плетнев</h2>
                                <p class="text-gray-500">Начальник РИЦ</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/4 md:w-1/2 w-full">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                            <img alt="team"
                                class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                src="https://picsum.photos/100?random=2">
                            <div class="flex-grow">
                                <h2 class="text-gray-900 title-font font-medium">Татьяна Юрьевна Карасевич</h2>
                                <p class="text-gray-500">Редактор</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/4 md:w-1/2 w-full">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                            <img alt="team"
                                class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                src="https://picsum.photos/100?random=3">
                            <div class="flex-grow">
                                <h2 class="text-gray-900 title-font font-medium">Евгений Шебин</h2>
                                <p class="text-gray-500">Старший печатник</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/4 md:w-1/2 w-full">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                            <img alt="team"
                                class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                src="https://picsum.photos/100?random=4">
                            <div class="flex-grow">
                                <h2 class="text-gray-900 title-font font-medium">Екатерина Шмонова</h2>
                                <p class="text-gray-500">Документовед</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endsection
