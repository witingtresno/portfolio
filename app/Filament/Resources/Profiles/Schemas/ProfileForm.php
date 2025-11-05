<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profile Details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('job')
                            ->required()
                            ->maxLength(255),
                        FileUpload::make('image')
                            ->disk('public')
                            ->image()
                            ->directory('profile')
                            ->imageEditor()
                            ->columnSpanFull(),
                        Textarea::make('bio')
                            ->rows(5)
                            ->placeholder('Short introduction for the landing page.')
                            ->columnSpanFull(),
                        Textarea::make('about_me')
                            ->rows(6)
                            ->label('About Me (long)')
                            ->placeholder('Tell your story, experience, and mission in more detail.')
                            ->columnSpanFull(),
                    ]),
                Section::make('Contact & Social Links')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('contact')
                            ->label('Primary Contact Link')
                            ->maxLength(255)
                            ->placeholder('mailto:you@example.com'),
                        TextInput::make('email')
                            ->email()
                            ->maxLength(255)
                            ->placeholder('you@example.com'),
                        TextInput::make('facebook')
                            ->maxLength(255)
                            ->placeholder('https://facebook.com/username'),
                        TextInput::make('instagram')
                            ->maxLength(255)
                            ->placeholder('https://instagram.com/username'),
                        TextInput::make('linkedin')
                            ->maxLength(255)
                            ->placeholder('https://linkedin.com/in/username'),
                        TextInput::make('github')
                            ->maxLength(255)
                            ->placeholder('https://github.com/username'),
                        TextInput::make('resume_link')
                            ->label('Resume Link')
                            ->maxLength(255)
                            ->placeholder('https://yourdomain.com/resume.pdf')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
