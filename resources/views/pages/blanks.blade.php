@extends('layouts.base')

@section('title', 'РИЦ :: Формы заявок на тиражирование')
@section('description', 'Формы заявок на тиражирование в РИЦ СГУ')

@section('main')

    <section class="body-font">
        <div class="flex flex-col w-full px-5 mb-10">
            <h1 class="sm:text-4xl text-center text-3xl font-bold mb-6 sm:mb-12 text-gray-700">
                Формы заявок на тиражирование
            </h1>
            <div class="entry-content space-y-4 lg:w-3/4 mx-auto text-left leading-normal sm:text-lg">
                <div class="grid sm:grid-cols-3 gap-4 text-sm">
                    <div class="flex flex-col">
                        <a class="text-center" href="https://disk.yandex.ru/i/fPjK_6lWD6HN-Q">
                            <img src="{{ asset('images/zayavka-na-uchebnie-planovie-izdaniya.png') }}"
                                alt="Форма заявки на учебные плановые издания">
                        </a>
                        <span class="text-center my-3">Форма заявки на учебные плановые издания</span>
                    </div>
                    <div class="flex flex-col">
                        <a class="text-center" href="https://disk.yandex.ru/i/ZxcnJKvoRqozeQ">
                            <img src="{{ asset('images/zayavka-za-schet-sredstv-zakazchika.png') }}"
                                alt="Форма заявки на издание за счет средств заказчика">
                        </a>
                        <span class="text-center my-3">Форма заявки на издание за счет средств заказчика</span>
                    </div>
                    <div class="flex flex-col">
                        <a class="text-center" href="https://disk.yandex.ru/i/2vATSEgSA5-3bQ">
                            <img src="{{ asset('images/zayavka-na-blanochnuyu-produkciu.png') }}"
                                alt=" Форма заявки на бланочную продукцию">
                        </a>
                        <span class="text-center my-3">Форма заявки на бланочную продукцию</span>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
