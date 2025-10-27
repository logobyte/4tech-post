<?php

namespace App\Filament\Resources\Users\Schemas;



use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;


use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // TextEntry::make('name')->required()->maxLength(255),
                // TextEntry::make('email')->required()->maxLength(255),
                // TextEntry::make('password')->required()->maxLength(255),
                // TextEntry::make('created_at'),
                // TextEntry::make('update_at'),
                TextInput::make('name')->required(),
                TextInput::make('email')->required(),
                TextInput::make('password')->required(),
            ]);
    }
}
