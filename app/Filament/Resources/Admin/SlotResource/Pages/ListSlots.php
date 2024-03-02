<?php

namespace App\Filament\Resources\Admin\SlotResource\Pages;

use App\Filament\Resources\Admin\SlotResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSlots extends ListRecords
{
    protected static string $resource = SlotResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
