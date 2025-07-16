@extends('layouts.base')

@section('title', 'РИЦ СГУ :: Краткий словарь издательских терминов')
@section('description', '')

@section('main')

    <section class="body-font">
        <div class="mb-10 flex w-full flex-col">
            <div class="entry-content mx-auto space-y-4 text-left">
                <div
                    class="flex flex-col items-center space-x-0 space-y-7 lg:flex-row lg:items-start lg:space-x-7 lg:space-y-0">
                    <div class="flex flex-none flex-col items-center justify-center space-y-5 md:justify-end">
                        <div class="square rounded-lg p-4 shadow-lg">
                            @isset($item->cover_url)
                                <img src="{{ $item->cover_url }}" alt="">
                            @else
                                <div class="relative flex w-96 flex-col">
                                    <div class="absolute left-9 w-56">
                                        <p class="mb-7 mt-10 px-4 text-center text-xs">{{ $item->author }}</p>
                                        <p class="px-2 text-center text-xs font-bold">{{ $item->title }}</p>
                                    </div>
                                    <img src="{{ asset('images/CD.png') }}" alt="">
                                </div>
                            @endisset
                        </div>
                        @isset($item->download_link)
                            <button
                                class="flex w-64 flex-row items-center justify-center rounded-xl bg-primary-500 py-1 text-white shadow-lg duration-300 ease-in-out hover:shadow-primary-400">
                                <img src="{{ asset('images/pdf.svg') }}" alt="" class="w-8"><span>Загрузить
                                    ({{ $item->size }} Мб)</span>
                            </button>
                        @endisset
                    </div>
                    <div class="shrink space-y-7 lg:max-w-3xl">
                        <div class="square rounded-lg px-7 py-5 shadow-lg">
                            <h1 class="text-lg font-bold sm:text-xl lg:text-2xl">{{ $item->title }}</h1>
                            <div class="mt-5 space-y-3 text-xs leading-snug sm:text-sm lg:text-base">
                                <div class="flex flex-row">
                                    <div class="basis-1/3 lg:basis-1/2 xl:basis-1/3 2xl:basis-1/4">Авторы:</div>
                                    <div class="basis-2/3 lg:basis-1/2 xl:basis-2/3 2xl:basis-3/4">{{ $item->author }}</div>
                                </div>
                                <div class="flex flex-row">
                                    <div class="basis-1/3 lg:basis-1/2 xl:basis-1/3 2xl:basis-1/4">Год издания:</div>
                                    <div class="basis-2/3 lg:basis-1/2 xl:basis-2/3 2xl:basis-3/4">{{ $item->year }}</div>
                                </div>
                                @isset($item->isbn)
                                    <div class="flex flex-row">
                                        <div class="basis-1/3 lg:basis-1/2 xl:basis-1/3 2xl:basis-1/4">ISBN:</div>
                                        <div class="basis-2/3 lg:basis-1/2 xl:basis-2/3 2xl:basis-3/4">{{ $item->isbn }}</div>
                                    </div>
                                @endisset
                                <div class="flex flex-row">
                                    <div class="basis-1/3 lg:basis-1/2 xl:basis-1/3 2xl:basis-1/4">Вид издания:</div>
                                    <div class="basis-2/3 lg:basis-1/2 xl:basis-2/3 2xl:basis-3/4">
                                        {{ $item->type->title }}</div>
                                </div>
                                @isset($item->registration_number)
                                    <div class="flex flex-row">
                                        <div class="basis-1/3 lg:basis-1/2 xl:basis-1/3 2xl:basis-1/4">№ госрегистрации:</div>
                                        <div class="basis-2/3 lg:basis-1/2 xl:basis-2/3 2xl:basis-3/4">
                                            {{ $item->registration_number }}
                                        </div>
                                    </div>
                                @endisset
                                @isset($item->registered_at)
                                    <div class="flex flex-row">
                                        <div class="basis-1/3 lg:basis-1/2 xl:basis-1/3 2xl:basis-1/4">Дата регистрации:</div>
                                        <div class="basis-2/3 lg:basis-1/2 xl:basis-2/3 2xl:basis-3/4">
                                            {{ Carbon\Carbon::create($item->registered_at)->format('d.m.Y') }}
                                        </div>
                                    </div>
                                @endisset
                                <div class="flex flex-row">
                                    <div class="basis-1/3 lg:basis-1/2 xl:basis-1/3 2xl:basis-1/4">Тип носителя:</div>
                                    <div class="basis-2/3 lg:basis-1/2 xl:basis-2/3 2xl:basis-3/4">
                                        {{ $item->distribution_type }}
                                    </div>
                                </div>
                                <div class="flex flex-row">
                                    <div class="basis-1/3 lg:basis-1/2 xl:basis-1/3 2xl:basis-1/4">Тип ресурса:</div>
                                    <div class="basis-2/3 lg:basis-1/2 xl:basis-2/3 2xl:basis-3/4">
                                        {{ $item->resource_type }}
                                    </div>
                                </div>
                                @isset($item->amount)
                                    <div class="flex flex-row">
                                        <div class="basis-1/3 lg:basis-1/2 xl:basis-1/3 2xl:basis-1/4">Тираж:</div>
                                        <div class="basis-2/3 lg:basis-1/2 xl:basis-2/3 2xl:basis-3/4">{{ $item->amount }}
                                        </div>
                                    </div>
                                @endisset
                                <div class="flex flex-row">
                                    <div class="basis-1/3 lg:basis-1/2 xl:basis-1/3 2xl:basis-1/4">Объем:</div>
                                    <div class="basis-2/3 lg:basis-1/2 xl:basis-2/3 2xl:basis-3/4">{{ $item->size }} Мб
                                    </div>
                                </div>

                            </div>
                        </div>
                        @isset($item->bibliographic_description)
                            <div class="square rounded-lg px-7 py-5 text-xs leading-snug shadow-lg sm:text-sm lg:text-base">
                                <h2 class="mb-3 text-base font-bold lg:text-lg">Библиографическое описание</h2>
                                <p>{{ $item->bibliographic_description }}</p>
                            </div>
                        @endisset
                        @isset($item->annotation)
                            <div class="square rounded-lg px-7 py-5 text-xs leading-snug shadow-lg sm:text-sm lg:text-base">
                                <h2 class="mb-3 text-base font-bold lg:text-lg">Аннотация</h2>
                                <p>{!! nl2br(e($item->annotation)) !!}</p>
                            </div>
                        @endisset
                        @isset($item->system_requirements)
                            <div class="square rounded-lg px-7 py-5 text-xs leading-snug shadow-lg sm:text-sm lg:text-base">
                                <h2 class="mb-3 text-base font-bold lg:text-lg">Системные требования</h2>
                                <p>{{ $item->system_requirements }}</p>
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
