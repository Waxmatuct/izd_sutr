@extends('layouts.base')

@section('title', 'РИЦ :: План издания ' . $year)
@section('description', 'План издания учебной и учебно-методической литературы на ' . $year . ' год')

@section('main')

    <section class="body-font">
        <div class="flex flex-col w-full px-5 mb-5">
            <h1 class="sm:text-4xl text-center text-3xl font-bold title-font mb-2">
                План издания учебной, учебно-методической и научной литературы<br>на {{ $year }} год
            </h1>
            <div class="entry-content space-y-4 lg:w-3/4 mx-auto text-left leading-normal sm:text-lg">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-bold mt-10 mb-5">
                        Показатели и статистика выполнения
                    </h2>
                    <stats-component :count="{{ $count }}" :sdano="{{ $sdano }}" :perc="{{ $perc }}"
                                     :size="{{ $size }}"></stats-component>
                    <div class="square w-full p-7 rounded-lg shadow-xl my-7">
                        <bar-chart :value="{{ $counts }}" :handed="{{ $is_handed }}"></bar-chart>
                    </div>
                    @if(date('Y')-1 <= $year)
                        <div class="mx-auto mt-12">
                            <h2 class="text-2xl sm:text-3xl font-bold mb-5">Статистика по
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
                        <h2 id="plan" class="text-2xl sm:text-3xl font-bold mb-5">План
                            издания учебной
                            литературы на {{ $year }} год</h2>
                        <p class="text-sm">* Таблица обновлена {{ $date->updated_at->diffForHumans() }}</p>
                        <p class="text-sm">** Литература приобретает статус «издано» после передачи на склад
                            материально-технического снабжения.</p>
                        @auth
                            <p class="text-sm mt-5">
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
