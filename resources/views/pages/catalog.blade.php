@extends('layouts.base')

@section('title', 'РИЦ СГУ :: Каталог электронных изданий')
@section('description', '')

@section('main')

    <section class="body-font">
        <div class="mb-10 flex w-full flex-col">
            <h1 class="mb-6 text-center text-3xl font-bold sm:mb-12 sm:text-4xl">
                Каталог электронных изданий
            </h1>

            <div class="mx-auto mt-10 w-full overflow-auto rounded-lg shadow-xl">
                <x-table.table :headers="[
                    '№',
                    'Автор, название',
                    'Вид издания',
                    '№ госрегистрации',
                    'Тип ресурса',
                    'Тип издания',
                    'Тираж',
                    'Год издания',
                ]" class="text-xs md:text-sm">
                    @foreach ($items as $item)
                        <tr class="border-b">
                            <x-table.td>
                                {{ $item->id }}
                            </x-table.td>
                            <x-table.td align="left">
                                <span class="font-bold">{{ $item->author }}</span><br>
                                {{ $item->title }}
                            </x-table.td>
                            <x-table.td>
                                {{ $item->type->title }}
                            </x-table.td>
                            <x-table.td>
                                {{ $item->registration_number }}
                            </x-table.td>
                            <x-table.td>
                                {{ $item->resource_type }}
                            </x-table.td>
                            <x-table.td>
                                {{ $item->edition_type }}
                            </x-table.td>
                            <x-table.td>
                                {{ $item->amount }}
                            </x-table.td>
                            <x-table.td>
                                {{ $item->year }}
                            </x-table.td>
                        </tr>
                    @endforeach
                </x-table.table>
            </div>
        </div>
    </section>
@endsection
