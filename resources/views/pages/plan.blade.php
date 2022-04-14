@extends('layouts.base')

@section('title', 'РИЦ :: План издания ' . $year)
@section('description', 'План издания учебной и учебно-методической литературы на ' . $year . ' год')

@section('main')

    <section class="body-font">
        <div class="flex flex-col w-full px-5 mb-5">
            <h1 class="sm:text-4xl text-center text-3xl font-bold title-font mb-6 sm:mb-12">
                План издания учебной, учебно-методической и научной литературы<br>на {{ $year }} год
            </h1>
            <div class="entry-content space-y-4 lg:w-3/4 mx-auto text-left leading-normal sm:text-lg">
                <p><a href="#plan">План издания учебной и учебно-методической литературы на
                        {{ $year }}
                        год</a> утвержден и подписан ректором.</p>
                <p>Срок предоставления рукописи указан в плане издания. Последний рабочий день месяца является конечной
                    датой сдачи рукописи с полным комплектом сопроводительных документов. </p>
                <p>Решение о приеме учебных и учебно-методических работ в производство принимается в течение семи рабочих
                    дней со дня предоставления автором в РИЦ распечатки текста, его электронного варианта и сопроводительных
                    документов в полном объеме.</p>
                <p class="text-2xl sm:text-3xl"><strong>Список сопроводительных документов:</strong></p>
                <ul class="list-disc md:ml-10">
                    <li>рецензия;</li>
                    <li>выписка из протокола заседания кафедры;</li>
                    <li>
                        <a href="{{ asset('docs/Spravka-VKR-VUZ.docx') }}" target="_blank" rel="noreferrer noopener">
                            справка о результатах проверки на наличие заимствований
                        </a> (утверждена <a href="{{ asset('docs/Prikaz-1100-ot-16-12-2020.pdf') }}" target="_blank"
                            rel="noreferrer noopener">
                            приказом № 1100
                        </a> от 16.12.2020);
                    </li>
                    <li>
                        <a href="{{ asset('docs/zayavka-na-uchebnie-planovie-izdaniya.pdf') }}" target="_blank"
                            rel="noreferrer noopener">
                            заявка на учебное плановое издание
                        </a>;
                    </li>
                    <li>лицензионный договор (<a href="{{ asset('docs/Tipovaya-forma-Litsenzionnyj-dogovor.pdf') }}"
                            target="_blank" rel="noreferrer noopener">
                            pdf
                        </a>, <a href="{{ asset('docs/Tipovaya-forma-Litsenzionnyj-dogovor.doc') }}" target="_blank"
                            rel="noreferrer noopener">
                            doc</a>) и акт приема-передачи экземпляра произведения (<a
                            href="{{ asset('docs/Akt-priema-peredachi-proizvedeniya.pdf') }}" target="_blank"
                            rel="noreferrer noopener">pdf</a>, <a
                            href="{{ asset('docs/Akt-priema-peredachi-proizvedeniya.docx') }}" target="_blank"
                            rel="noreferrer noopener">
                            doc</a>). Договор и акт передаются в двух экземплярах.
                    </li>
                </ul>
                <div>
                    <h2 class="text-2xl sm:text-3xl font-bold mt-10 mb-5">
                        Показатели и статистика выполнения
                    </h2>
                    <div id="stats">
                        <stats-component :count="{{ $count }}" :sdano="{{ $sdano }}"
                            :perc="{{ $perc }}" :size="{{ $size }}"></stats-component>
                    </div>
                    <div class="square w-full p-7 rounded-lg shadow-xl my-7">
                        <canvas id="myChart" data-values="{{ $counts }}" data-handed="{{ $is_handed }}"></canvas>
                    </div>
                    <div class="mx-auto mt-12">
                        <h2 class="text-2xl sm:text-3xl font-bold mb-5">Статистика по
                            факультетам</h2>
                        @foreach ($faculties as $faculty)
                            <a class="inline-block"
                                href="{{ route('faculty', ['year' => $year, 'faculty' => $faculty->slug]) }}">
                                {{ $faculty->title }}
                            </a><br>
                        @endforeach
                    </div>
                    <div class="mx-auto mt-12">
                        <h2 id="plan" class="text-2xl sm:text-3xl font-bold mb-5">План
                            издания учебной
                            литературы на {{ $year }} год</h2>
                        <p class="text-sm">* Таблица обновлена {{ $date->updated_at->diffForHumans() }}</p>
                        <p class="text-sm">** Литература приобретает статус «издано» после передачи на склад
                            материально-технического снабжения.</p>
                    </div>
                </div>

            </div>
        </div>

        @if ($books->isNotEmpty())
            <div id="books">
                <books-component :year="{{ $year }}"></books-component>
            </div>
            {{-- <div class="w-full mx-auto overflow-auto rounded-lg shadow-xl">
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
                                @if ($book->is_handed == 1)
                                    {{ $book->status }}
                                @endif
                            </x-table.td>
                        </tr>
                    @endforeach
                </x-table.table>
            </div> --}}
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
                            'rgba(99, 102, 241, 0.5)',
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
                            'rgba(75, 192, 192, 0.5)',
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
                    title: {
                        display: true,
                        text: 'Динамика сдачи изданий по месяцам',
                        font: {
                            size: 16
                        },
                    }
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
