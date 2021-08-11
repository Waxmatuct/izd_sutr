<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            План издания {{ $year }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container mx-auto sm:px-6 lg:px-8">

            @if ($books->isNotEmpty())
                <div class="w-full mx-auto overflow-auto rounded-lg shadow-2xl bg-white text-gray-700">
                    
                    @include('dashboard.includes.table')
                    
                </div>
            @else
                <span>Нет данных</span>
            @endif 

        </div>
    </div>
</x-app-layout>