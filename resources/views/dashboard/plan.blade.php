<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            План издания {{ $year }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">

            @if ($books->isNotEmpty())
                <div id="app">

                    <admin-books :year="{{ $year }}"></admin-books>
                    {{-- @include('dashboard.includes.table') --}}

                </div>
            @else
                <span>Нет данных</span>
            @endif

        </div>
    </div>
</x-app-layout>
