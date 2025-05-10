<?php

namespace App\Filament\Clusters\Blog\Resources\TagResource\Pages;

use App\Filament\Clusters\Blog\Resources\TagResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTag extends EditRecord
{
    protected static string $resource = TagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
