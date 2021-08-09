<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Добавить в план издания
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

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

            <div class="w-full">
                <form action="{{ route('dashboard.book.store') }}" method="POST">
                    @csrf

                    <div class="">
                        <label class="block text-sm text-gray-600" for="title">Номер</label>
                        <input id="item" name="item"
                            class="w-42 px-5 py-2 text-gray-700 bg-gray-200 rounded" type="text" required value="{{ old('item') }}">
                    </div>

                    <div class="mt-5">
                        <label class="block text-sm text-gray-600" for="category">Факультет</label>
                        <div class="relative w-max">
                            <select id="faculty_id" name="faculty_id"
                                class="text-gray-600 bg-gray-200 rounded appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10">
                                @foreach ($faculties as $faculty)
                                    <option value="{{ $faculty->id }}">{{ $faculty->title }}</option>
                                @endforeach
                            </select>
                            <span class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"></path></svg>
                            </span>
                        </div>
                    </div>

                    <div class="mt-5">
                        <label class="block text-sm text-gray-600" for="author">Авторы</label>
                        <input id="author" name="author" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded"  type="text" required="" value="{{ old('author') }}">
                    </div>

                    <div class="mt-5">
                        <label class="block text-sm text-gray-600" for="slug">Наименование издания</label>
                        <textarea id="title" name="title"
                            class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded leading-normal" rows="3" required>{{ old('title') }}
                        </textarea>
                    </div>

                    <div class="mt-5">
                        <label class="block text-sm text-gray-600" for="category">Вид издания</label>
                        <div class="relative w-max">
                            <select id="type_id" name="type_id"
                                class="text-gray-600 bg-gray-200 rounded appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10">
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->title }}</option>
                                @endforeach
                            </select>
                            <span class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"></path></svg>
                            </span>
                        </div>
                    </div>

                    <div class="mt-5">
                        <label class="block text-sm text-gray-600" for="author">Дисциплина</label>
                        <input id="disciple" name="disciple" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded"  type="text" required="" value="{{ old('disciple') }}">
                    </div>

                    <div class="mt-5">
                        <label class="block text-sm text-gray-600" for="title">Объем</label>
                        <input id="size" name="size"
                            class="w-42 px-5 py-2 text-gray-700 bg-gray-200 rounded" type="text" required value="{{ old('size') }}">
                    </div>

                    <div class="mt-5">
                        <label class="block text-sm text-gray-600" for="title">Тираж</label>
                        <input id="amount" name="amount"
                            class="w-42 px-5 py-2 text-gray-700 bg-gray-200 rounded" type="text" required value="{{ old('amount') }}">
                    </div>

                    <div class="mt-5">
                        <label class="block text-sm text-gray-600" for="category">Месяц сдачи</label>
                        <div class="relative w-max">
                            <select id="month_id" name="month_id"
                                class="text-gray-600 bg-gray-200 rounded appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10">
                                @foreach ($months as $month)
                                    <option value="{{ $month->id }}">{{ $month->name }}</option>
                                @endforeach
                            </select>
                            <span class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"></path></svg>
                            </span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                            class="px-5 py-2 text-white tracking-wider bg-purple-700 hover:bg-green-500 rounded">
                            Отправить
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>