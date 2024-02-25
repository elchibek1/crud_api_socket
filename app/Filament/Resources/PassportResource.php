<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PassportResource\Pages;
use App\Filament\Resources\PassportResource\RelationManagers;
use App\Models\Passport;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PassportResource extends Resource
{
    protected static ?string $model = Passport::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasRole('admin');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('passportNumber')
                    ->rules(['bail', 'string', 'min:5', 'max:100'])
                    ->reactive()
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->limit(20)->sortable()->searchable(),
                TextColumn::make('passportNumber')->limit(20)->sortable()->searchable(),
                TextColumn::make('user.name')->sortable(),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPassports::route('/'),
            'create' => Pages\CreatePassport::route('/create'),
            'edit' => Pages\EditPassport::route('/{record}/edit'),
        ];
    }
}
