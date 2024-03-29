<p>Добрый день.</p>
<p>Это ежемесячная рассылка РИЦ о ходе выполнения плана издания учебной, учебно-методической и научной литературы за
    {{ $year }} год.</p>
На данный момент план издания выполнен на <strong>{{ $stats['perc'] }}%</strong>. Подробную информацию и отдельную
статистику по факультетам вы можете посмотреть
<a href="https://izd.sutr.ru/plan-{{ $year }}" target="_blank" rel="noopener noreferrer">на нашем
    сайте</a>.<br>

<p><small style="text-align: left">Это информационное письмо. Отвечать на него не нужно.</small></p><br>
<table style="border: 1px solid black; border-collapse: collapse; background: white; font-size: 13px;">
    <caption style="font-weight: bold; text-align: center; font-size: 16px;">Список запланированных изданий на
        {{ $month }}
    </caption>
    <thead style="background-color: #d1d5db;">
        <tr>
            <th style="text-align: center; padding: 5px; border: 1px solid #eee;">
                № в плане
            </th>
            <th style="text-align: center; padding: 5px; border: 1px solid #eee;">
                Факультет
            </th>
            <th style="text-align: center; padding: 5px; border: 1px solid #eee;">
                Авторы
            </th>
            <th style="text-align: center; padding: 5px; border: 1px solid #eee;">
                Наименование рукописи
            </th>
            <th style="text-align: center; padding: 5px; border: 1px solid #eee;">
                Вид издания
            </th>
            <th style="text-align: center; padding: 5px; border: 1px solid #eee;">
                Дисциплина
            </th>
            <th style="text-align: center; padding: 5px; border: 1px solid #eee;">
                Объем, уч.изд. л
            </th>
            <th style="text-align: center; padding: 5px; border: 1px solid #eee;">
                Тираж
            </th>
            <th style="text-align: center; padding: 5px; border: 1px solid #eee;">
                Принято
            </th>
            <th style="text-align: center; padding: 5px; border: 1px solid #eee;">
                Статус
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($plan as $book)
            <tr @if ($loop->even) style="background-color: #f3f4f6" @endif>
                <td style="text-align: center; padding: 5px; border: 1px solid #eee;">
                    {{ $book->item }}
                </td>
                <td style="text-align: center; padding: 5px; border: 1px solid #eee;">
                    {{ $book->faculty->short_title }}
                </td>
                <td style="text-align: center; padding: 5px; border: 1px solid #eee;">
                    {{ $book->author }}
                </td>
                <td style="text-align: center; padding: 5px; border: 1px solid #eee;">
                    {{ $book->title }}
                </td>
                <td style="text-align: center; padding: 5px; border: 1px solid #eee;">
                    {{ $book->type->title }}
                </td>
                <td style="text-align: center; padding: 5px; border: 1px solid #eee;">
                    {{ $book->disciple }}
                </td>
                <td style="text-align: center; padding: 5px; border: 1px solid #eee;">
                    {{ $book->size }}
                </td>
                <td style="text-align: center; padding: 5px; border: 1px solid #eee;">
                    {{ $book->amount }}
                </td>
                <td style="text-align: center; padding: 5px; border: 1px solid #eee;">
                    @if ($book->is_handed == 1)
                        ✔
                    @else
                    @endif
                </td>
                <td style="text-align: center; padding: 5px; border: 1px solid #eee;">
                    @if ($book->is_handed == 1)
                        {{ $book->status }}
                    @else
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
