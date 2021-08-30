@extends('layouts.base')

@section('title', 'РИЦ :: Our team')

@section('main')

    <section class="text-gray-600 body-font">
        <div class="flex flex-col w-full mb-10">
            <h1 class="sm:text-4xl text-center text-3xl font-bold mb-6 sm:mb-12 text-gray-700">
                Контакты
            </h1>
            <p class="mb-0"><strong>Адрес</strong>: г. Сочи, ул. Пластунская, 94, корпус №1, каб. 113/1</p>
            <p class="mb-0"><strong>Телефон/факс</strong>: <a href="tel: +78622682573">+7 (862) 268 25 73</a></p>
            <p class="mb-0"><strong>E-mail</strong>: <a href="mailto:izd-sgu@yandex.ru">izd-sgu@yandex.ru</a></p>
            <p class="mb-0"><strong>Время работы</strong>: ПН-ЧТ с 9:00 до 18:00, ПТ с 9:00 до 17:00.</p>
            <section class="text-gray-600 body-font">
                <div class="container px-5 py-24 mx-auto">
                    <div class="flex flex-col text-center w-full mb-20">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Our Team</h1>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon
                            brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't
                            heard of them.</p>
                    </div>
                    <div class="flex flex-wrap -m-2">
                        <div class="p-2 lg:w-1/4 md:w-1/2 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                <img alt="team"
                                    class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                    src="https://dummyimage.com/80x80">
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium">Holden Caulfield</h2>
                                    <p class="text-gray-500">UI Designer</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 lg:w-1/4 md:w-1/2 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                <img alt="team"
                                    class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                    src="https://dummyimage.com/84x84">
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium">Henry Letham</h2>
                                    <p class="text-gray-500">CTO</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 lg:w-1/4 md:w-1/2 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                <img alt="team"
                                    class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                    src="https://dummyimage.com/88x88">
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium">Oskar Blinde</h2>
                                    <p class="text-gray-500">Founder</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 lg:w-1/4 md:w-1/2 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                <img alt="team"
                                    class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                    src="https://dummyimage.com/90x90">
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium">John Doe</h2>
                                    <p class="text-gray-500">DevOps</p>
                                </div>
                            </div>
                        </div>
                    </div>

            </section>
        @endsection
