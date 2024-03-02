<?php

namespace App\Filament\Resources\Admin\SlotResource\Pages;

use App\Filament\Resources\Admin\SlotResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSlot extends ViewRecord
{
    protected static string $resource = SlotResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
