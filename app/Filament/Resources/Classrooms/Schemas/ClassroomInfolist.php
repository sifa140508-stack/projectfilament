<?php

namespace App\Filament\Resources\Classrooms\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ClassroomInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('Major.name')
                    ->numeric(),
                TextEntry::make('name'),
                TextEntry::make('level')
                    ->label('Grade')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        10 => 'X',
                        11 => 'XI',
                        12 => 'XII',
                    }),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
