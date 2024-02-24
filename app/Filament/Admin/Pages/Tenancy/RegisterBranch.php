<?php

namespace App\Filament\Admin\Pages\Tenancy;

use App\Models\Branch;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Pages\Tenancy\RegisterTenant;
use Illuminate\Support\Str;

class RegisterBranch extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register Branch';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->unique(table: Branch::class, column: 'name')
            ]);
    }

    protected function handleRegistration(array $data): Branch
    {
        $data['company_id'] = auth()->user()->company_id;

        $branch = Branch::create($data);

        $branch->users()->attach(auth()->user());

        return $branch;
    }
}
