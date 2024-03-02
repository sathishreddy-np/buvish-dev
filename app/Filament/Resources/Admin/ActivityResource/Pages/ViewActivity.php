<?php

namespace App\Filament\Resources\Admin\ActivityResource\Pages;

use App\Filament\Resources\Admin\ActivityResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewActivity extends ViewRecord
{
    protected static string $resource = ActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
