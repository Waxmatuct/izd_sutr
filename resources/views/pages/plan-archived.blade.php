@extends('layouts.base')

@section('title', 'РИЦ СГУ :: План издания ' . $year)
@section('description', 'План издания учебной и учебно-методической литературы на ' . $year . ' год')

@section('main')

    <section class="body-font">
        <div class="mb-5 flex w-full flex-col px-5">
            <h1 class="title-font mb-2 text-center text-3xl font-bold sm:text-4xl">
                План издания учебной, учебно-методической и научной литературы<br>на {{ $year }} год
            </h1>
            <div class="entry-content mx-auto space-y-4 text-left leading-normal sm:text-lg lg:w-3/4">
                <div>
                    <h2 class="mb-5 mt-10 text-2xl font-bold sm:text-3xl">
                        Показатели и статистика выполнения
                    </h2>
                    <stats-component :count="{{ $count }}" :sdano="{{ $sdano }}" :perc="{{ $perc }}"
                        :size="{{ $size }}"></stats-component>
                    <div class="square my-7 w-full rounded-lg p-7 shadow-xl">
                        <bar-chart :value="{{ $counts }}" :handed="{{ $is_handed }}"></bar-chart>
                    </div>
                    @if (date('Y') - 1 <= $year)
                        <div class="mx-auto mt-12">
                            <h2 class="mb-5 text-2xl font-bold sm:text-3xl">Статистика по
                                структурным подразделениям</h2>
                            @foreach ($faculties as $faculty)
                                <a class="inline-block"
                                    href="{{ route('faculty', ['year' => $year, 'faculty' => $faculty->slug]) }}">
                                    {{ $faculty->title }}
                                </a><br>
                            @endforeach
                        </div>
                    @endif
                    <div class="mx-auto mt-12">
                        <h2 id="plan" class="mb-5 text-2xl font-bold sm:text-3xl">План
                            издания учебной
                            литературы на {{ $year }} год</h2>
                        <p class="text-sm">* Таблица обновлена {{ $date->updated_at->diffForHumans() }}</p>
                        <p class="text-sm">** Литература приобретает статус «издано» после передачи на склад
                            материально-технического снабжения.</p>
                        @auth
                            <p class="mt-5 text-sm">
                                Издано: <strong>{{ $published }}</strong>, на калькуляции:
                                <strong>{{ $in_calculation }}</strong>, отпечатано:
                                <strong>{{ $printed }}</strong>, в печати: <strong>{{ $in_print }}</strong>, в
                                работе: <strong>{{ $in_work }}</strong>
                            </p>
                        @endauth
                    </div>
                </div>

            </div>
        </div>

        <div id="books">
            <books-component :year="{{ $year }}"></books-component>
        </div>

    </section>
@endsection
