@extends('layouts.base')

@section('title', 'РИЦ СГУ :: Краткий словарь издательских терминов')
@section('description', '')

@section('main')

    <section class="body-font">
        <div class="mb-10 flex w-full flex-col px-5">
            {{-- <h1 class="mb-6 text-center text-3xl font-bold sm:mb-12 sm:text-4xl">
                Краткий словарь издательских терминов
            </h1> --}}
            <div class="entry-content mx-auto space-y-4 text-left lg:w-3/4">
                <div class="flex flex-col space-x-0 space-y-5 md:flex-row md:space-x-5 md:space-y-0">
                    <div class="basis-1/4">
                        <img src="{{ asset('/images/no-foto.jpg') }}" alt="">
                    </div>
                    <div class="basis-3/4">
                        <h1 class="text-2xl font-bold">{{ $item->title }}</h1>
                        <div class="mt-5 space-y-3 text-lg leading-snug">
                            <div class="flex flex-row">
                                <div class="basis-1/4">Авторы:</div>
                                <div class="basis-3/4">{{ $item->author }}</div>
                            </div>
                            <div class="flex flex-row">
                                <div class="basis-1/4">Год издания:</div>
                                <div class="basis-3/4">{{ $item->year }}</div>
                            </div>
                            <div class="flex flex-row">
                                <div class="basis-1/4">ISBN:</div>
                                <div class="basis-3/4">{{ $item->isbn }}</div>
                            </div>
                            <div class="flex flex-row">
                                <div class="basis-1/4">Вид издания:</div>
                                <div class="basis-3/4">{{ Str::of($item->type->title)->lower() }}</div>
                            </div>
                            <div class="flex flex-row">
                                <div class="basis-1/4">№ госрегистрации:</div>
                                <div class="basis-3/4">
                                    {{ $item->registration_number }}
                                </div>
                            </div>
                            <div class="flex flex-row">
                                <div class="basis-1/4">Дата регистрации:</div>
                                <div class="basis-3/4">{{ Carbon\Carbon::create($item->registered_at)->format('d.m.Y') }}
                                </div>
                            </div>
                            <div class="flex flex-row">
                                <div class="basis-1/4">Тип издания:</div>
                                <div class="basis-3/4">{{ $item->edition_type }}</div>
                            </div>
                            <div class="flex flex-row">
                                <div class="basis-1/4">Тираж:</div>
                                <div class="basis-3/4">{{ $item->amount }}</div>
                            </div>
                            <div class="flex flex-row">
                                <div class="basis-1/4">Размер:</div>
                                <div class="basis-3/4">{{ $item->size }} Мб</div>
                            </div>
                            <div class="flex flex-row">
                                <div class="basis-1/4">Библиографическое описание:</div>
                                <div class="basis-3/4">{{ $item->bibliographic_description }}</div>
                            </div>
                            <div class="flex flex-row">
                                <div class="basis-1/4">Системные требования:</div>
                                <div class="basis-3/4">{{ $item->system_requirements }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
