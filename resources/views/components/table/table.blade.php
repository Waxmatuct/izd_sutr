<table {{ $attributes->merge(['class' => 'table-auto w-full bg-white']) }}>
    <thead class="bg-gray-300 text-gray-800 dark:text-gray-300 dark:bg-gray-700 {{ $textSize }}">
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
