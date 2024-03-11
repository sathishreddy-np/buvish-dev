<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Timing: string implements HasLabel
{
    case Open = 'open';
    case Close = 'close';
    case Break = 'break';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Open => 'Open',
            self::Close => 'Close',
            self::Break => 'Break',
        };
    }
}
