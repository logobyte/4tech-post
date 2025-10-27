<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("name")->sortable( true)->searchable( true)
                ->label("Client Name"),
                TextColumn::make("email")->searchable( true),
                TextColumn::make("created_at")->searchable( true),

            ])
            ->filters([
                // SelectFilter::make("created_at"),
                // DatePicker::make("created_at")
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
