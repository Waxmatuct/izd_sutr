<table class="table-auto w-full text-xs md:text-sm">
    <thead class="bg-gray-300 text-gray-800 text-sm md:text-base">
        <tr>
            @foreach ($headers as $header)
                <th scope="col" class="text-center py-3 px-4">{{ $header }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>
