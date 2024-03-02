<?php

namespace App\Filament\Resources\Admin\SlotResource\Pages;

use App\Filament\Resources\Admin\SlotResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSlot extends EditRecord
{
    protected static string $resource = SlotResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
