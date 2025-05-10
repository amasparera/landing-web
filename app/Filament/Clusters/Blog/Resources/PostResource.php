<?php

namespace App\Filament\Clusters\Blog\Resources;

use App\Filament\Clusters\Blog;
use App\Filament\Clusters\Blog\Resources\PostResource\Pages;
use App\Filament\Clusters\Blog\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $cluster = Blog::class;

    //title',
    // 'content',
    // 'image',
    // 'video',

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->unique(ignorable: fn(?Post $record) => $record)
                    ->maxLength(255),
                Forms\Components\Select::make('tags')
                    ->relationship('tags', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->required(),
                // status radio buttons

                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(65535),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('1920')
                    ->imageResizeTargetHeight('1080')
                    ->maxSize(1024),
                Forms\Components\FileUpload::make('video')
                    ->maxSize(10240),
                Forms\Components\Radio::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ])
                    ->default('draft')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
