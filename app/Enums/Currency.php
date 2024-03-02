<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Currency: string implements HasLabel
{

    case USD = 'USD'; // United States Dollar
    case EUR = 'EUR'; // Euro
    case GBP = 'GBP'; // British Pound Sterling
    case JPY = 'JPY'; // Japanese Yen
    case AUD = 'AUD'; // Australian Dollar
    case INR = 'INR'; // Indian Rupee
    case LKR = 'LKR'; // Sri Lankan Rupee

    public function getLabel(): ?string
    {

        return match ($this) {
            self::USD => 'USD',
            self::EUR => 'EUR',
            self::GBP => 'GBP',
            self::JPY => 'JPY',
            self::AUD => 'AUD',
            self::INR => 'INR',
            self::LKR => 'LKR',
        };
    }
}
