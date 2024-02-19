<?php

namespace App\Filament\Admin\Pages\Tenancy;

use App\Models\Team;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Pages\Tenancy\EditTenantProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class EditTeamProfile extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Branch profile';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->live()
                    ->required()
                    ->unique(table: Team::class, column: 'name')
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                        if (($get('slug') ?? '') !== Str::slug($old)) {
                            return;
                        }

                        $set('slug', Str::slug($state));
                    }),

                    Hidden::make('slug')
                    ->unique(table: Team::class, column: 'slug')
                    ->required()
                ]);
    }
}
