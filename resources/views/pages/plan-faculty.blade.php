@extends('layouts.base')

@section('title', 'РИЦ :: План издания ' . $year)

@section('main')

    <section class="text-gray-600 body-font">
        <div class="flex flex-col w-full mb-5">
            <h1 class="sm:text-4xl text-center text-3xl font-bold title-font mb-6 sm:mb-12 text-gray-700">
                {{ $faculty->title }}. Статистика на {{ $year }} год
            </h1>
            <div class="entry-content space-y-4 lg:w-3/4 mx-auto text-left leading-normal sm:text-lg">
                <p>
                    {{ $faculty->title }} запланировал в {{ $year }} году <strong>{{ $count }}</strong>
                    изданий общим объемом <strong>{{ $size }}</strong> уч. изд. л. На текщий момент сдано в РИЦ
                    <strong>{{ $sdano }}</strong> работ. План издания {{ $faculty->title }} выполнил на
                    <strong>{{ $perc }}%</strong>.
                </p>
                <div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-700 mt-10">Общая динамика сдачи изданий</h2>

                    <div class="overflow-auto p-7 rounded-lg shadow-2xl my-7">
                        <canvas id="myChart" data-values="{{ $counts }}" data-handed="{{ $is_handed }}"></canvas>
                    </div>

                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-700 mt-12 mb-5">План издания учебной литературы
                        {{ $faculty->short_title }} на {{ $year }} год</h2>

                    <div class="mx-auto">
                        <p class="text-sm">* Таблица обновлена {{ $date->updated_at->diffForHumans() }}</p>
                        <p class="text-sm">** Литература приобретает статус «издано» после передачи на склад
                            материально-технического снабжения.</p>
                    </div>

                </div>

            </div>
        </div>

        @if ($books->isNotEmpty())
            <div class="w-full mx-auto overflow-auto rounded-lg shadow-2xl">
                <x-table.table head-size="text-xs" class="text-xs"
                    :headers="['№ в плане','Факультет','Авторы','Наименование рукописи','Вид издания','Дисциплина','Объем, уч.изд. л','Тираж','Месяц сдачи','Сдано','Статус **']">
                    @foreach ($books as $book)
                        <tr class="@if ($loop->even) bg-gray-100 @endif hover:bg-primary-100" id="{{ $book->id }}">
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
                                {{ $book->month->name }}
                            </x-table.td>
                            <x-table.td>
                                @if ($book->is_handed == 1)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary-500 h-5 w-5 mx-auto"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </x-table.td>
                            <x-table.td>
                                @if ($book->is_handed == 1) {{ $book->status }} @endif
                            </x-table.td>
                        </tr>
                    @endforeach
                </x-table.table>
            </div>
        @else
            <span>Нет данных</span>
        @endif

    </section>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var values = document.getElementById('myChart').getAttribute('data-values').split(',');
        var is_handed = document.getElementById('myChart').getAttribute('data-handed').split(',');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Cентябрь'],
                datasets: [{
                        label: 'Запланировано',
                        data: values,
                        backgroundColor: [
                            'rgba(99, 102, 241, 0.4)',
                        ],
                        borderColor: [
                            'rgba(99, 102, 241, 0.7)',
                        ],
                        borderWidth: 2,

                    },
                    {
                        label: 'Сдано',
                        data: is_handed,
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.4)',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 0.7)',
                        ],
                        borderWidth: 2,

                    },
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                },
                responsive: true,
            }
        });
    </script>
@endsection

@push('chartjs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"
        integrity="sha512-asxKqQghC1oBShyhiBwA+YgotaSYKxGP1rcSYTDrB0U6DxwlJjU59B67U8+5/++uFjcuVM8Hh5cokLjZlhm3Vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
