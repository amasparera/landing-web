<?php

namespace App\Filament\Clusters\Blog\Resources;

use App\Filament\Clusters\Blog;
use App\Filament\Clusters\Blog\Resources\TagResource\Pages;
use App\Filament\Clusters\Blog\Resources\TagResource\RelationManagers;
use App\Models\Tag;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TagResource extends Resource
{
    protected static ?string $model = Tag::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-down-on-square-stack';

    protected static ?string $cluster = Blog::class;

    // 'name',
    //     'slug',
    //     'description',
    //     'meta_title',
    //     'meta_description',
    //     'meta_keywords',
    //     'meta_robots',
    //     'meta_canonical',
    //     'meta_image',

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->unique(ignorable: fn(?Tag $record) => $record)
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(ignorable: fn(?Tag $record) => $record)
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535),
                Forms\Components\TextInput::make('meta_title')
                    ->maxLength(255),
                Forms\Components\TextInput::make('meta_description')
                    ->maxLength(65535),
                Forms\Components\TextInput::make('meta_keywords')
                    ->maxLength(255),
                Forms\Components\TextInput::make('meta_robots')
                    ->maxLength(255),
                Forms\Components\TextInput::make('meta_canonical')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('meta_image')
                    ->image()
                    ->preserveFilenames()
                    ->directory('tags/images')
                    ->visibility('public'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('meta_title')
                    ->limit(50)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('meta_description')
                    ->limit(50)
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListTags::route('/'),
            'create' => Pages\CreateTag::route('/create'),
            'edit' => Pages\EditTag::route('/{record}/edit'),
        ];
    }
}
