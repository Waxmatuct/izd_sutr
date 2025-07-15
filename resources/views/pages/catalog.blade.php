@extends('layouts.base')

@section('title', 'РИЦ СГУ :: Каталог электронных изданий')
@section('description', '')

@section('main')

    <section class="body-font">
        <div class="mb-10 flex w-full flex-col">
            <h1 class="text-center text-3xl font-bold sm:text-4xl">
                Каталог электронных изданий
            </h1>

            <div class="mx-auto mt-10 w-full overflow-auto rounded-lg shadow-xl">
                <x-table.table :headers="[
                    '№',
                    'Автор',
                    'Название',
                    'Вид издания',
                    'Тип ресурса',
                    'Тип носителя',
                    'Тираж',
                    'Год издания',
                ]" headSize="text-xs md:text-sm" class="text-xs md:text-sm">
                    @foreach ($items as $item)
                        <tr @class(['hover:bg-primary-100','bg-gray-100' => $loop->even])>
                            <x-table.td scope="row">
                                {{ $loop->iteration }}
                            </x-table.td>
                            <x-table.td>
                                {{ $item->author }}
                            </x-table.td>
                            <x-table.td align="left">
                                <a href="{{ route('electronic-editions.show', $item) }}">{{ $item->title }}
                                </a>
                            </x-table.td>
                            <x-table.td>
                                {{ $item->type->title }}
                            </x-table.td>
                            <x-table.td>
                                {{ $item->resource_type }}
                            </x-table.td>
                            <x-table.td>
                                {{ $item->distribution_type }}
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
