<?php

namespace App\Enums;

enum BookMonthEnum: int
{
    case Jan = 1;
    case Feb = 2;
    case Mar = 3;
    case Apr = 4;
    case May = 5;
    case Jun = 6;
    case Jul = 7;
    case Aug = 8;
    case Sep = 9;
    case Oct = 10;
    case Nov = 11;
    case Dec = 12;

    public function label(): string
    {
        return match ($this) {
            self::Jan => 'Январь',
            self::Feb => 'Февраль',
            self::Mar => 'Март',
            self::Apr => 'Апрель',
            self::May => 'Май',
            self::Jun => 'Июнь',
            self::Jul => 'Июль',
            self::Aug => 'Август',
            self::Sep => 'Сентябрь',
            self::Oct => 'Октябрь',
            self::Nov => 'Ноябрь',
            self::Dec => 'Декабрь',
        };
    }

    public static function keyLabels(): array
    {
        return array_reduce(self::cases(), function ($carry, BookMonthEnum $item) {
            $carry[$item->value] = $item->label();
            return $carry;
        }, []);
    }

}
