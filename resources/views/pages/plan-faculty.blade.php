@extends('layouts.base')

@section('title', $faculty->short_title . ': анализ выполнения плана издания в ' . $year . ' году')
@section('description', $faculty->short_title . ': анализ выполнения плана издания в ' . $year . ' году')

@section('main')

    <section class="body-font">
        <div class="mb-5 flex w-full flex-col px-5">
            <h1 class="title-font mb-2 text-center text-3xl font-bold sm:text-4xl">
                {{ $faculty->title }}
            </h1>
            <span class="title-font mb-6 text-center text-xl font-bold sm:mb-12 sm:text-2xl">
                Анализ выполнения плана издания в {{ $year }} году
            </span>
            <div class="entry-content mx-auto space-y-4 text-left leading-normal sm:text-lg lg:w-3/4">
                <stats-component :count="{{ $count }}" :sdano="{{ $sdano }}" :perc="{{ $perc }}"
                    :size="{{ $size }}"></stats-component>
                <div>
                    <div class="square mb-7 overflow-auto rounded-lg p-7 shadow-xl">
                        <bar-chart :value="{{ $counts }}" :handed="{{ $is_handed }}"></bar-chart>
                    </div>

                    <h2 class="mb-5 mt-12 text-2xl font-bold sm:text-3xl">План издания учебной литературы
                        {{ $faculty->short_title }} на {{ $year }} год</h2>

                    <div class="mx-auto">
                        <p class="text-sm">* Таблица обновлена {{ $date->updated_at->diffForHumans() }}</p>
                        {{-- <p class="text-sm">** Литература приобретает статус «издано» после передачи на склад
                            материально-технического снабжения.</p> --}}
                    </div>

                </div>
            </div>
        </div>

        @if ($books->isNotEmpty())
            <div class="mx-auto w-full overflow-auto rounded-lg shadow-xl">
                <x-table.table head-size="text-xs" class="text-xs" :headers="[
                    '№ в плане',
                    'Факультет',
                    'Авторы',
                    'Наименование рукописи',
                    'Вид издания',
                    'Дисциплина',
                    'Объем, уч.изд. л',
                    'Тираж',
                    'Срок сдачи',
                    'Принято к изданию',
                    'Статус **',
                ]">
                    @foreach ($books as $book)
                        <tr class="@if ($loop->even) bg-gray-100 @endif hover:bg-primary-100"
                            id="{{ $book->id }}">
                            <x-table.td font="bold">
                                {{ $book->item }}
                            </x-table.td>
                            <x-table.td>
                                {{ $book->faculty->short_title }}
                            </x-table.td>
                            <x-table.td>
                                {{ $book->author }}
                            </x-table.td>
                            <x-table.td>
                                {{ $book->title }}
                            </x-table.td>
                            <x-table.td>
                                {{ $book->type->title }}
                            </x-table.td>
                            <x-table.td>
                                {{ $book->disciple }}
                            </x-table.td>
                            <x-table.td>
                                {{ $book->size }}
                            </x-table.td>
                            <x-table.td>
                                {{ $book->amount }}
                            </x-table.td>
                            <x-table.td>
                                {{ $book->month }}
                            </x-table.td>
                            <x-table.td>
                                @if ($book->is_handed == 1)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-5 w-5 text-secondary-500"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </x-table.td>
                            <x-table.td>
                                @if ($book->is_handed == 1)
                                    {{ $book->status }}
                                @endif
                            </x-table.td>
                        </tr>
                    @endforeach
                </x-table.table>
            </div>
        @else
            <span>Нет данных</span>
        @endif

    </section>

@endsection
