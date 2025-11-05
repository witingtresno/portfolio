<?php

namespace App\Filament\Resources\Skills\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Skill Details')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('category')
                            ->maxLength(255),
                        TextInput::make('level')
                            ->maxLength(255)
                            ->placeholder('e.g. Expert, Intermediate, 80%'),
                        TextInput::make('icon')
                            ->maxLength(255)
                            ->label('Icon Path / URL')
                            ->placeholder('icons/skills/php.svg')
                            ->helperText('Let empty for initials. Accepts public path or full URL.'),
                        TextInput::make('display_order')
                            ->numeric()
                            ->label('Display Order')
                            ->default(0)
                            ->minValue(0),
                    ]),
            ]);
    }
}
