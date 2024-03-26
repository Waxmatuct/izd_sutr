@php use App\Enums\BookMonthEnum; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            План издания {{ $year }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div id="app">
                <admin-books :year="{{ $year }}"></admin-books>
            </div>
        </div>
    </div>
</x-app-layout>
