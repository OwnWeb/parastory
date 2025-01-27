<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StoryResource\Pages;
use App\Filament\Resources\StoryResource\RelationManagers;
use App\Models\Author;
use App\Models\Story;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StoryResource extends Resource
{
    protected static ?string $model = Story::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('author_id')
                    ->required()
                    ->relationship(name: 'author', titleAttribute: 'id')
                    ->getOptionLabelFromRecordUsing(fn (Author $author) => $author->name),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(2048),
                Forms\Components\Textarea::make('subtitle')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\MarkdownEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Forms\Components\TextInput::make('source_url')
                    ->maxLength(2048),
                Forms\Components\TextInput::make('track_url')
                    ->maxLength(2048),
                Forms\Components\TextInput::make('default_locale')
                    ->required()
                    ->maxLength(5),
                Forms\Components\FileUpload::make('images')->multiple()->maxFiles(10),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('author_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('source_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('track_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('default_locale')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStories::route('/'),
            'create' => Pages\CreateStory::route('/create'),
            'edit' => Pages\EditStory::route('/{record}/edit'),
        ];
    }
}
