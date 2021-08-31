@props(['align' => 'center', 'font' => 'normal'])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'text-left';
        break;
    case 'right':
        $alignmentClasses = 'text-right';
        break;
    case 'center':
    default:
        $alignmentClasses = 'text-center';
        break;
}
switch ($font) {
    case 'bold':
        $fontWeight = 'font-bold';
        break;
    case 'normal':
    default:
        $fontWeight = 'font-normal';
        break;
}
@endphp

<td class="{{ $alignmentClasses }} py-3 px-4 {{ $fontWeight }}" {{ $attributes }}>
    {{ $slot }}
</td>
