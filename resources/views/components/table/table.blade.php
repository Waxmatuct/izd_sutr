@props(['text' => 'base'])

@php
switch ($text) {
    case 'xs':
        $textSize = 'text-xs';
        break;
    case 'sm':
        $textSize = 'text-xs md:text-sm';
        break;
    case 'base':
    default:
        $textSize = 'text-sm md:text-base';
        break;
    case 'lg':
        $textSize = 'text-lg md:text-xl';
        break;
    case 'xl':
        $textSize = 'text-xl md:text-2xl';
        break;
}
@endphp

<table {{ $attributes->merge(['class' => 'table-auto w-full']) }}>
    <thead class="bg-gray-300 text-gray-800 {{ $textSize }}">
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
