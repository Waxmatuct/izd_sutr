@extends('layouts.base')

@section('title', 'РИЦ СГУ :: Прайс-лист')
@section('description', 'Прайс-лист редакционно-издательских услуг')

@section('main')

    <section class="body-font">
        <div class="mb-10 flex w-full flex-col px-5">
            <h1 class="mb-6 text-center text-3xl font-bold sm:mb-12 sm:text-4xl">
                Прайс-лист
            </h1>
            <div class="entry-content mx-auto space-y-4 text-left leading-normal sm:text-lg lg:w-3/4">

                <p><img src="{{ asset('/images/pdf.svg') }}" alt="" class="inline-block w-16"><a
                        href="https://disk.yandex.ru/i/Yj-MDLSlSC5eeg">Прайс-лист редакционно-издательских услуг (266
                        Кб)</a></p>
                <p>Прейскурант цен (прайс-лист) утвержден приказами университета №196 от 14.06.2024 и №232 от 02.08.2024 и
                    служит основой для определения
                    окончательной стоимости
                    редакционно-издательских услуг.</p>
                <p>Чтобы узнать точную стоимость, свяжитесь с нами по телефону <a href="tel: +78622682573">+7
                        (862) 268 25 73</a> или по e-mail <a href="mailto:izd-sgu@yandex.ru">izd-sgu@yandex.ru</a></p>
            </div>
        </div>
    </section>
@endsection
