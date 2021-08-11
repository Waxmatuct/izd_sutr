<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            План издания {{ $year }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container mx-auto sm:px-6 lg:px-8">

            @if ($books->isNotEmpty())
            <div class="w-full mx-auto overflow-auto rounded-lg shadow-2xl bg-white text-gray-700">
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
                        </tr>
                    </thead>
                    <tbody>
    
                        @foreach ($books as $book)
                        
                        <tr class="@if ($loop->even) bg-gray-100 @endif hover:bg-indigo-100">
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
                                @unless ($book->is_handed == 0)
                                    @foreach ($months as $month)
                                        @if ($book->handed_in === $month->id)
                                            {{ $month->name }}
                                        @endif
                                    @endforeach
                                @endunless
                            </td>
                            <td class="text-center py-3 px-4 text-green-500 text-lg">
                                @if ($book->is_handed == 1) ✔ @endif
                            </td>
                            <td class="text-center py-3 px-4">
                                @if ($book->is_handed == 1) {{ $book->status }} @endif
                            </td>
                        </tr>
                        
                        @endforeach
    
                    </tbody>
                </table>
            </div>
            @else
                <span>Нет данных</span>
            @endif 

        </div>
    </div>
</x-app-layout>