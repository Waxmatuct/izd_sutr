@extends('layouts.base')

@section('title', 'РИЦ СГУ :: Формы заявок на тиражирование')
@section('description', 'Формы заявок на тиражирование в РИЦ СГУ')

@section('main')

    <section class="body-font">
        <div class="mb-10 flex w-full flex-col px-5">
            <h1 class="mb-6 text-center text-3xl font-bold text-gray-700 sm:mb-12 sm:text-4xl">
                Формы заявок на тиражирование
            </h1>
            <div class="entry-content mx-auto space-y-4 text-left leading-normal sm:text-lg lg:w-3/4">
                <div class="grid gap-4 text-sm sm:grid-cols-3">
                    <div class="flex flex-col">
                        <a class="text-center" href="https://disk.yandex.ru/i/apClFj9uriCVmQ">
                            <img src="{{ asset('images/zayavka-na-uchebnie-planovie-izdaniya.png') }}"
                                alt="Форма заявки на учебные плановые издания">
                        </a>
                        <span class="my-3 text-center">Форма заявки на учебные плановые издания</span>
                    </div>
                    <div class="flex flex-col">
                        <a class="text-center" href="https://disk.yandex.ru/i/ZxcnJKvoRqozeQ">
                            <img src="{{ asset('images/zayavka-za-schet-sredstv-zakazchika.png') }}"
                                alt="Форма заявки на издание за счет средств заказчика">
                        </a>
                        <span class="my-3 text-center">Форма заявки на издание за счет средств заказчика</span>
                    </div>
                    <div class="flex flex-col">
                        <a class="text-center" href="https://disk.yandex.ru/i/GflPtZcqrG1WKw">
                            <img src="{{ asset('images/zayavka-na-blanochnuyu-produkciu.png') }}"
                                alt=" Форма заявки на бланочную продукцию">
                        </a>
                        <span class="my-3 text-center">Форма заявки на бланочную продукцию</span>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
