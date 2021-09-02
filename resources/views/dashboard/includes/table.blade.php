<table class="table-auto w-full text-xs">
    <thead class="bg-gray-300 text-gray-800">
        <tr>
            <th class="text-center py-3 px-4">
                № в плане
            </th>
            <th class="text-center py-3 px-4">
                Факультет
            </th>
            <th class="text-center py-3 px-4">
                Авторы
            </th>
            <th class="text-center py-3 px-4">
                Наименование рукописи
            </th>
            <th class="text-center py-3 px-4">
                Вид издания
            </th>
            <th class="text-center py-3 px-4">
                Дисциплина
            </th>
            <th class="text-center py-3 px-4">
                Объем, уч.изд. л
            </th>
            <th class="text-center py-3 px-4">
                Тираж
            </th>
            <th class="text-center py-3 px-4">
                Месяц сдачи
            </th>
            <th class="text-center py-3 px-4">
                Когда сдано
            </th>
            <th class="text-center py-3 px-4">
                Сдано
            </th>
            <th class="text-center py-3 px-4 whitespace-nowrap">
                Статус **
            </th>
            <th class="text-center py-3 px-4 whitespace-nowrap">
                Удалить
            </th>
        </tr>
    </thead>
    <tbody>

        @foreach ($books as $book)

            <tr class="@if ($loop->even) bg-gray-100 @endif @if ($book->deleted_at) text-red-400 @endif hover:bg-primary-100">
                <th class="text-center py-3 px-4">
                    <a href="{{ route('dashboard.book.edit', $book) }}" title="Правка">
                        {{ $book->item }}
                    </a>
                </th>
                <td class="text-center py-3 px-4">
                    {{ $book->faculty->short_title }}
                </td>
                <td class="text-center py-3 px-4">
                    {{ $book->author }}
                </td>
                <td class="text-center py-3 px-4">
                    {{ $book->title }}
                </td>
                <td class="text-center py-3 px-4">
                    {{ $book->type->title }}
                </td>
                <td class="text-center py-3 px-4">
                    {{ $book->disciple }}
                </td>
                <td class="text-center py-3 px-4">
                    {{ $book->size }}
                </td>
                <td class="text-center py-3 px-4">
                    {{ $book->amount }}
                </td>
                <td class="text-center py-3 px-4">
                    {{ $book->month->name }}
                </td>
                <td class="text-center py-3 px-4">
                    @if ($book->is_handed == 1)
                        @foreach ($months as $month)
                            @if ($book->handed_in === $month->id)
                                {{ $month->name }}
                            @endif
                        @endforeach
                    @endif
                </td>
                <td class="text-center py-3 px-4 text-secondary-500 text-lg">
                    @if ($book->is_handed == 1) ✔ @endif
                </td>
                <td class="text-center py-3 px-4">
                    @if ($book->is_handed == 1) {{ $book->status }} @endif
                </td>
                <td class="text-center py-3 px-4">
                    @empty($book->deleted_at)
                        @include('dashboard.includes.delete')
                    @endempty
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
