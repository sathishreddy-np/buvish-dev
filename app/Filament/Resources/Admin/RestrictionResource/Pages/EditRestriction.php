<?php

namespace App\Filament\Resources\Admin\RestrictionResource\Pages;

use App\Filament\Resources\Admin\RestrictionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRestriction extends EditRecord
{
    protected static string $resource = RestrictionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
