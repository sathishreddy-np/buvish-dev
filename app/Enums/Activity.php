<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Activity: string implements HasLabel
{
    case Swimming = 'swimming';
    case Badminton = 'badminton';
    case GYM = 'gym';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Swimming => 'Swimming',
            self::Badminton => 'Badminton',
            self::GYM => 'GYM',
        };
    }
}
