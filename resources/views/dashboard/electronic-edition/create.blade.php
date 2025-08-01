<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Добавить электронное издание
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-6xl rounded-xl bg-white p-6 shadow-lg lg:p-8">

            @include('dashboard.includes.message')

            @include('dashboard.includes.errors')

            <form action="{{ route('electronic-editions.store') }}" method="POST" class="w-full">
                @csrf
                <div class="grid gap-5 md:grid-cols-3">
                    <div class="flex max-w-screen-lg flex-col md:col-span-2 space-y-5">

                        <div>
                            <label class="block text-sm text-gray-600" for="author">Автор</label>
                            <input id="author" name="author"
                                   class="w-full rounded border-gray-400 bg-gray-200 px-5 py-2 text-gray-700 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                                   type="text" required="" value="{{ old('author') }}">
                        </div>

                        <div>
                            <label class="block text-sm text-gray-600" for="title">Наименование издания</label>
                            <textarea id="title" name="title"
                                      class="w-full rounded border-gray-400 bg-gray-200 px-5 py-2 leading-normal text-gray-700 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                                      rows="3" required>{{ old('title') }}</textarea>
                        </div>

                        <div class="flex flex-row space-x-5">
                            <div class="basis-3/5">
                                <label class="block text-sm text-gray-600" for="type_id">Вид издания</label>
                                <div class="relative">
                                    <select id="type_id" name="type_id"
                                            class="w-full appearance-none rounded border-gray-400 bg-gray-200 py-2 pr-10 pl-3 text-base text-gray-600 focus:ring-primary-200 focus:border-primary-500 focus:ring-2">
                                        <option selected disabled>
                                            Вид издания
                                        </option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->title }}</option>
                                        @endforeach
                                    </select>
                                    <x-down-arrow></x-down-arrow>
                                </div>
                            </div>

                            <div class="basis-1/5">
                                <label class="block text-sm text-gray-600" for="registered_at">Дата регистрации</label>
                                <input id="registered_at" name="registered_at"
                                       class="w-full rounded border-gray-400 bg-gray-200 px-5 py-2 text-gray-700 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                                       type="text" required value="{{ old('registered_at') }}">
                            </div>
                            <div class="basis-1/5">
                                <label class="block text-sm text-gray-600" for="year">Год издания</label>
                                <div class="relative">
                                    <select id="year" name="year"
                                            class="w-full appearance-none rounded border-gray-400 bg-gray-200 py-2 pr-10 pl-3 text-base text-gray-600 focus:ring-primary-200 focus:border-primary-500 focus:ring-2">
                                        <option selected disabled>
                                            Год
                                        </option>
                                        @foreach ($years as $year)
                                            <option value="{{ $year }}" @selected(old('year') === $year)>
                                                {{ $year }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-down-arrow></x-down-arrow>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-row space-x-5">
                            <div class=" basis-1/2">
                                <label class="block text-sm text-gray-600" for="registration_number">Номер гос.
                                    регистрации</label>
                                <input id="registration_number" name="registration_number"
                                       class="w-full rounded border-gray-400 bg-gray-200 px-5 py-2 text-gray-700 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                                       type="text" value="{{ old('registration_number') }}">
                            </div>
                            <div class="basis-1/2">
                                <label class="block text-sm text-gray-600" for="isbn">Номер ISBN</label>
                                <input id="isbn" name="isbn"
                                       class="w-full rounded border-gray-400 bg-gray-200 px-5 py-2 text-gray-700 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                                       type="text" value="{{ old('isbn') }}">
                            </div>
                        </div>

                        <div class="flex flex-row space-x-5">
                            <div class="basis-1/4">
                                <label class="block text-sm text-gray-600" for="distribution_type">Тип носителя</label>
                                <input id="distribution_type" name="distribution_type"
                                       class="w-full rounded border-gray-400 bg-gray-200 px-5 py-2 text-gray-700 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                                       type="text" required value="CD-R">
                            </div>
                            <div class="basis-1/4">
                                <label class="block text-sm text-gray-600" for="resource_type">Тип ресурса</label>
                                <input id="resource_type" name="resource_type"
                                       class="w-full rounded border-gray-400 bg-gray-200 px-5 py-2 text-gray-700 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                                       type="text" required value="Текстовое ЭИ">
                            </div>
                            <div class="basis-1/4">
                                <label class="block text-sm text-gray-600" for="size">Объем</label>
                                <input id="size" name="size"
                                       class="w-full rounded border-gray-400 bg-gray-200 px-5 py-2 text-gray-700 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                                       type="text" required value="{{ old('size') }}">
                            </div>
                            <div class="basis-1/4">
                                <label class="block text-sm text-gray-600" for="amount">Тираж</label>
                                <input id="amount" name="amount"
                                       class="w-full rounded border-gray-400 bg-gray-200 px-5 py-2 text-gray-700 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                                       type="text" required value="{{ old('amount') }}">
                            </div>
                        </div>

                        <div class="flex flex-row space-x-5">
                            <div class="basis-1/2">
                                <label class="block text-sm text-gray-600" for="cover_url">URL обложки</label>
                                <input id="cover_url" name="cover_url"
                                       class="w-full rounded border-gray-400 bg-gray-200 px-5 py-2 text-gray-700 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                                       type="text" value="{{ old('cover_url') }}">
                            </div>
                            <div class="basis-1/2">
                                <label class="block text-sm text-gray-600" for="download_link">Ссылка на
                                    скачивание</label>
                                <input id="download_link" name="download_link"
                                       class="w-full rounded border-gray-400 bg-gray-200 px-5 py-2 text-gray-700 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                                       type="text" value="{{ old('download_link') }}">
                            </div>
                        </div>
                    </div>

                    <div class="space-y-5 flex flex-col md:mt-0 md:w-full">

                        <div class="flex flex-col h-full">
                            <label class="block text-sm text-gray-600" for="system_requirements">Сист.
                                требования</label>
                            <textarea id="system_requirements" name="system_requirements"
                                      class="w-full h-full rounded border-gray-400 bg-gray-200 px-5 py-2 leading-normal text-gray-700 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                                      required>{{ old('system_requirements') }}</textarea>
                        </div>
                        <div class="flex flex-col h-full">
                            <label class="block text-sm text-gray-600" for="bibliographic_description">Библиографическое
                                описание</label>
                            <textarea id="bibliographic_description" name="bibliographic_description"
                                      class="w-full h-full rounded border-gray-400 bg-gray-200 px-5 py-2 leading-normal text-gray-700 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                                      required>{{ old('bibliographic_description') }}</textarea>
                        </div>
                        <div class="flex flex-col h-full">
                            <label class="block text-sm text-gray-600" for="annotation">Аннотация</label>
                            <textarea id="annotation" name="annotation"
                                      class="w-full h-full rounded border-gray-400 bg-gray-200 px-5 py-2 leading-normal text-gray-700 focus:ring-primary-200 focus:border-primary-500 focus:ring-2"
                            >{{ old('annotation') }}</textarea>
                        </div>
                    </div>

                    <div class="md:col-span-3 md:mt-0 flex justify-center">
                        <button type="submit"
                                class="mx-auto rounded px-10 py-2 tracking-wider text-white bg-secondary-500 hover:bg-secondary-400"
                        @disabled(($errors->isNotEmpty()))>
                            Отправить
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
