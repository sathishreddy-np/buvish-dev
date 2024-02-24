<?php

namespace App\Filament\Resources\Admin\BranchResource\Pages;

use App\Filament\Resources\Admin\BranchResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBranch extends ViewRecord
{
    protected static string $resource = BranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
