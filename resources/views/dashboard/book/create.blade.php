<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Добавить в план издания
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-5xl rounded-xl bg-white p-6 shadow-lg lg:p-8">

            @include('dashboard.includes.message')

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Ой!</strong> Тут какая-то проблема с полями.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('dashboard.book.store') }}" method="POST" class="w-full">
                @csrf
                <div class="grid gap-5 md:grid-cols-3">
                    <div class="flex max-w-screen-lg flex-col md:col-span-2 space-y-5">
                        <div>
                            <label class="block text-sm text-gray-600" for="title">Номер</label>
                            <input id="item" name="item"
                                class="rounded border-gray-400 bg-gray-200 px-5 py-2 text-gray-700 w-42 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                                type="text" required value="{{ old('item') }}" autofocus>
                        </div>

                        <div>
                            <label class="block text-sm text-gray-600" for="category">Факультет</label>
                            <div class="relative w-max">
                                <select id="faculty_id" name="faculty_id"
                                    class="appearance-none rounded border-gray-400 bg-gray-200 py-2 pr-10 pl-3 text-base text-gray-600 focus:ring-primary-200 focus:border-primary-500 focus:ring-2">
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty->id }}">{{ $faculty->title }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="pointer-events-none absolute top-0 right-0 flex h-full w-10 items-center justify-center text-center text-gray-600">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" class="h-4 w-4" viewBox="0 0 24 24">
                                        <path d="M6 9l6 6 6-6"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm text-gray-600" for="author">Авторы</label>
                            <input id="author" name="author"
                                class="w-full rounded border-gray-400 bg-gray-200 px-5 py-2 text-gray-700 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                                type="text" required="" value="{{ old('author') }}">
                        </div>

                        <div>
                            <label class="block text-sm text-gray-600" for="slug">Наименование издания</label>
                            <textarea id="title" name="title"
                                class="w-full rounded border-gray-400 bg-gray-200 px-5 py-2 leading-normal text-gray-700 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                                rows="3" required>{{ old('title') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm text-gray-600" for="category">Вид издания</label>
                            <div class="relative w-max">
                                <select id="type_id" name="type_id"
                                    class="appearance-none rounded border-gray-400 bg-gray-200 py-2 pr-10 pl-3 text-base text-gray-600 focus:ring-primary-200 focus:border-primary-500 focus:ring-2">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->title }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="pointer-events-none absolute top-0 right-0 flex h-full w-10 items-center justify-center text-center text-gray-600">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" class="h-4 w-4" viewBox="0 0 24 24">
                                        <path d="M6 9l6 6 6-6"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>

                    </div>

                    <div class="space-y-5 flex flex-col md:mt-0 md:w-full">

                        <div class="flex flex-col h-full">
                            <label class="block text-sm text-gray-600" for="author">Дисциплина</label>
                            <textarea id="disciple" name="disciple"
                                class="w-full h-full rounded border-gray-400 bg-gray-200 px-5 py-2 leading-normal text-gray-700 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                                required>{{ old('disciple') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm text-gray-600" for="title">Объем</label>
                            <input id="size" name="size"
                                class="w-full rounded border-gray-400 bg-gray-200 px-5 py-2 text-gray-700 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                                type="text" required value="{{ old('size') }}">
                        </div>

                        <div>
                            <label class="block text-sm text-gray-600" for="title">Тираж</label>
                            <input id="amount" name="amount"
                                class="w-full rounded border-gray-400 bg-gray-200 px-5 py-2 text-gray-700 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                                type="text" required value="{{ old('amount') }}">
                        </div>

                        <div class="flex flex-row justify-between">
                            <div>
                                <label class="block text-sm text-gray-600" for="category">Месяц сдачи</label>
                                <div class="relative w-max">
                                    <select id="month_id" name="month_id"
                                        class="appearance-none rounded border-gray-400 bg-gray-200 py-2 pr-10 pl-3 text-base text-gray-600 focus:ring-primary-200 focus:border-primary-500 focus:ring-2">
                                        @foreach ($months as $month)
                                            <option value="{{ $month->id }}">{{ $month->name }}</option>
                                        @endforeach
                                    </select>
                                    <span
                                        class="pointer-events-none absolute top-0 right-0 flex h-full w-10 items-center justify-center text-center text-gray-600">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" class="h-4 w-4"
                                            viewBox="0 0 24 24">
                                            <path d="M6 9l6 6 6-6"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600" for="category">Год</label>
                                <div class="relative w-max">
                                    <select id="year" name="year"
                                        class="appearance-none rounded border-gray-400 bg-gray-200 py-2 pr-10 pl-3 text-base text-gray-600 focus:ring-primary-200 focus:border-primary-500 focus:ring-2">
                                        <option value="2024" selected>2024</option>
                                        <option value="2023">2023</option>
                                    </select>
                                    <span
                                        class="pointer-events-none absolute top-0 right-0 flex h-full w-10 items-center justify-center text-center text-gray-600">
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

                    <div class="md:col-span-3 md:mt-0 flex justify-center">
                        <button type="submit"
                            class="mx-auto rounded px-10 py-2 tracking-wider text-white bg-secondary-500 hover:bg-secondary-400">
                            Отправить
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
