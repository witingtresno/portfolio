<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Project Information')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('subtitle')
                            ->label('Subtitle / Category')
                            ->maxLength(255),
                        TextInput::make('link')
                            ->label('External Link')
                            ->url()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->rows(6)
                            ->placeholder('Describe what the project is about, your role, and the impact.')
                            ->columnSpanFull(),
                    ]),
                Section::make('Media & Display')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('images')
                            ->label('Gallery')
                            ->disk('public')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->directory('projects')
                            ->imageEditor()
                            ->columnSpanFull(),
                        TextInput::make('display_order')
                            ->numeric()
                            ->label('Display Order')
                            ->default(0)
                            ->helperText('Lower numbers appear first.')
                            ->minValue(0),
                    ]),
            ]);
    }
}
