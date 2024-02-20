<?php

namespace App\Filament\Admin\Pages\Tenancy;

use App\Models\Branch;
use App\Models\Company;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Pages\Tenancy\RegisterTenant;
use Illuminate\Database\Eloquent\Model;
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
                    ->live()
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                        if (($get('slug') ?? '') !== Str::slug($old)) {
                            return;
                        }

                        $set('slug', Str::slug($state));
                    }),

                Hidden::make('slug')
                    ->unique(table: Branch::class, column: 'slug')
                    ->required()
            ]);
    }

    protected function handleRegistration(array $data): Branch
    {
        $company_id = Company::create(['name' => 'Main Branch'])->id;
        $data['company_id'] = $company_id;

        $branch = Branch::create($data);

        $branch->users()->attach(auth()->user());

        return $branch;
    }
}
