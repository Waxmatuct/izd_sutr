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
                        <a href="https://disk.yandex.ru/i/I1o6BxWCAaUEIQ" target="_blank" rel="noreferrer noopener">
                            справка о результатах проверки на наличие заимствований
                        </a> (утверждена <a href="https://disk.yandex.ru/i/_-2X9yooKtO4kg" target="_blank"
                            rel="noreferrer noopener">
                            приказом № 1100
                        </a> от 16.12.2020);
                    </li>
                    <li>
                        <a href="https://disk.yandex.ru/i/fPjK_6lWD6HN-Q" target="_blank" rel="noreferrer noopener">
                            заявка на учебное плановое издание
                        </a>;
                    </li>
                    <li>лицензионный договор (<a href="https://disk.yandex.ru/i/bmoRYpdLiKTXSw" target="_blank"
                            rel="noreferrer noopener">.pdf</a>, <a href="https://disk.yandex.ru/i/NL5JceTtToUn1w"
                            target="_blank" rel="noreferrer noopener">
                            .doc</a>), акт приема-передачи экземпляра произведения (<a
                            href="https://disk.yandex.ru/i/JUMnuBPAWVcEtQ" target="_blank"
                            rel="noreferrer noopener">.pdf</a>, <a href="https://disk.yandex.ru/i/IgDfuGVavA3knQ"
                            target="_blank" rel="noreferrer noopener">
                            .doc</a>). Договор и акт передаются в РИЦ в двух экземплярах <strong>вместе с листом
                            согласования (<a href="https://disk.yandex.ru/i/3mEE0evzJ_PYXA" target="_blank"
                                rel="noreferrer noopener">.pdf</a>),
                            подписанным правовым управлением</strong>.
                    </li>
                </ul>
                <div>
                    <h2 class="text-2xl sm:text-3xl font-bold mt-10 mb-5">
                        Показатели и статистика выполнения
                    </h2>
                    <stats-component :count="{{ $count }}" :sdano="{{ $sdano }}" :perc="{{ $perc }}"
                        :size="{{ $size }}"></stats-component>
                    <div class="square w-full p-7 rounded-lg shadow-xl my-7">
                        <bar-chart :value="{{ $counts }}" :handed="{{ $is_handed }}"></bar-chart>
                        {{-- <canvas id="myChart" data-values="{{ $counts }}" data-handed="{{ $is_handed }}"></canvas> --}}
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
        @else
            <span>Нет данных</span>
        @endif

    </section>
@endsection
