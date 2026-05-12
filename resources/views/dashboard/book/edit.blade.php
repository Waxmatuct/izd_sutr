<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Изменить издание
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="relative mx-auto max-w-5xl rounded-xl bg-white p-6 shadow-lg lg:p-8">

            @include('dashboard.includes.message')

            @include('dashboard.includes.errors')

            <div>
                <form action="{{ route('dashboard.book.update', $book) }}" method="POST" class="w-full">
                    @csrf
                    @method('PATCH')
                    <div class="grid gap-0 md:grid-cols-3 md:gap-5">
                        <div class="flex max-w-screen-lg flex-col md:col-span-2">
                            <div>
                                <label class="block text-sm text-gray-600" for="title">Номер</label>
                                <input id="item" name="item"
                                    class="w-42 rounded border-gray-400 bg-gray-200 px-5 py-2 text-gray-700 focus:border-primary-500 focus:ring-2 focus:ring-primary-200"
                                    type="text" required value="{{ $book->item }}">
                            </div>
                            <div class="mt-5">
                                <label class="block text-sm text-gray-600" for="category">Факультет</label>
                                <div class="relative w-max">
                                    <select id="faculty_id" name="faculty_id"
                                        class="appearance-none rounded border-gray-400 bg-gray-200 py-2 pl-3 pr-10 text-base text-gray-600 focus:border-primary-500 focus:ring-2 focus:ring-primary-200">
                                        @foreach ($faculties as $faculty)
                                            @if ($book->faculty_id === $faculty->id)
                                                <option selected="selected" value="{{ $faculty->id }}">
                                                    {{ $faculty->title }}</option>
                                            @else
                                                <option value="{{ $faculty->id }}">{{ $faculty->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <x-down-arrow></x-down-arrow>
                                </div>
                            </div>
                            <div class="mt-5">
                                <label class="block text-sm text-gray-600" for="author">Авторы</label>
                                <input id="author" name="author"
                                    class="w-full rounded border-gray-400 bg-gray-200 px-5 py-2 text-gray-700 focus:border-primary-500 focus:ring-2 focus:ring-primary-200"
                                    type="text" required="" value="{{ $book->author }}">
                            </div>
                            <div class="mt-5">
                                <label class="block text-sm text-gray-600" for="slug">Наименование издания</label>
                                <textarea id="title" name="title"
                                    class="w-full rounded border-gray-400 bg-gray-200 px-5 py-2 leading-normal text-gray-700 focus:border-primary-500 focus:ring-2 focus:ring-primary-200"
                                    rows="3" required>{{ $book->title }}</textarea>
                            </div>
                            <div class="mt-5">
                                <label class="block text-sm text-gray-600" for="category">Вид издания</label>
                                <div class="relative w-max">
                                    <select id="type_id" name="type_id"
                                        class="appearance-none rounded border-gray-400 bg-gray-200 py-2 pl-3 pr-10 text-base text-gray-600 focus:border-primary-500 focus:ring-2 focus:ring-primary-200">
                                        @foreach ($types as $type)
                                            @if ($book->type_id === $type->id)
                                                <option selected="selected" value="{{ $type->id }}">
                                                    {{ $type->title }}
                                                </option>
                                            @else
                                                <option value="{{ $type->id }}">{{ $type->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <x-down-arrow></x-down-arrow>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 flex flex-col md:mt-0 md:w-full">
                            <div class="___class_+?28___">
                                <label class="block text-sm text-gray-600" for="author">Дисциплина</label>
                                <textarea id="disciple" name="disciple"
                                    class="w-full rounded border-gray-400 bg-gray-200 px-5 py-2 leading-normal text-gray-700 focus:border-primary-500 focus:ring-2 focus:ring-primary-200"
                                    rows="3" required>{{ $book->disciple }}</textarea>
                            </div>
                            <div class="mt-5">
                                <label class="block text-sm text-gray-600" for="title">Объем</label>
                                <input id="size" name="size"
                                    class="w-full rounded border-gray-400 bg-gray-200 px-5 py-2 text-gray-700 focus:border-primary-500 focus:ring-2 focus:ring-primary-200"
                                    type="text" required value="{{ $book->size }}">
                            </div>
                            <div class="mt-5">
                                <label class="block text-sm text-gray-600" for="title">Тираж</label>
                                <input id="amount" name="amount"
                                    class="w-full rounded border-gray-400 bg-gray-200 px-5 py-2 text-gray-700 focus:border-primary-500 focus:ring-2 focus:ring-primary-200"
                                    type="text" required value="{{ $book->amount }}">
                            </div>
                            <div class="flex flex-row justify-between">
                                <div class="mt-5">
                                    <label class="block text-sm text-gray-600" for="category">Месяц сдачи</label>
                                    <div class="relative w-max">
                                        <select id="month_id" name="month_id"
                                            class="appearance-none rounded border-gray-400 bg-gray-200 py-2 pl-3 pr-10 text-base text-gray-600 focus:border-primary-500 focus:ring-2 focus:ring-primary-200">
                                            @foreach ($months as $key => $month)
                                                <option value="{{ $key }}"
                                                    {{ $book->month_id->value === $key ? 'selected="selected"' : '' }}>
                                                    {{ $month }}</option>
                                            @endforeach
                                        </select>
                                        <x-down-arrow></x-down-arrow>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between">
                                <div class="mt-5">
                                    <label class="block text-sm text-gray-600" for="category">Сдано</label>
                                    <div class="w-max">
                                        <input type="hidden" name="is_handed" value="0">
                                        <input type="checkbox" name="is_handed" id="is_handed" value="1"
                                            @if ($book->is_handed) checked @endif>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <label class="block text-sm text-gray-600" for="category">Статус</label>
                                    <div class="relative w-max">
                                        <select id="status" name="status"
                                            class="appearance-none rounded border-gray-400 bg-gray-200 py-2 pl-3 pr-10 text-base text-gray-600 focus:border-primary-500 focus:ring-2 focus:ring-primary-200">
                                            @foreach ($statuses as $key => $status)
                                                @if ($book->status === $key)
                                                    <option selected="selected" value="{{ $key }}">
                                                        {{ $status }}</option>
                                                @else
                                                    <option value="{{ $key }}">{{ $status }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <span
                                            class="pointer-events-none absolute right-0 top-0 flex h-full w-10 items-center justify-center text-center text-gray-600">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="h-4 w-4"
                                                viewBox="0 0 24 24">
                                                <path d="M6 9l6 6 6-6"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 md:col-span-3 md:mt-0">
                            <button type="submit"
                                class="rounded bg-secondary-500 px-10 py-2 tracking-wider text-white hover:bg-secondary-400">
                                Сохранить
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
