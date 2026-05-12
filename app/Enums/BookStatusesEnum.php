<?php

namespace App\Enums;

enum BookStatusesEnum: string
{
    case IN_WORK = 'inWork';
    case IN_PRINT = 'inPrint';
    case PRINTED = 'printed';
    case CALCULATING = 'calculating';
    case PUBLISHED = 'published';
    case IN_LIBRARY = 'inLibrary';

    public function label(): string
    {
        return match ($this) {
            self::IN_WORK => 'В работе',
            self::IN_PRINT => 'В печати',
            self::PRINTED => 'Отпечатано',
            self::CALCULATING => 'На калькуляции',
            self::PUBLISHED => 'Издано',
            self::IN_LIBRARY => 'Передано в ЭБС'
        };
    }

    public static function keyLabels(): array
    {
        return array_reduce(self::cases(), function ($carry, BookStatusesEnum $item) {
            $carry[$item->value] = $item->label();
            return $carry;
        }, []);
    }
}
