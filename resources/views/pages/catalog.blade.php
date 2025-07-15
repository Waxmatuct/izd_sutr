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
                            @can('create', \App\Models\ElectronicEdition::class)
                                <x-table.td>
                                    <a href="{{ route('electronic-editions.edit',  $item) }}" class="text-red-300 hover:text-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                </x-table.td>
                            @endcan
                        </tr>
                    @endforeach
                </x-table.table>
            </div>
        </div>
    </section>
@endsection
