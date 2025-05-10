<?php

namespace App\Filament\Clusters\Blog\Resources\TagResource\Pages;

use App\Filament\Clusters\Blog\Resources\TagResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTag extends CreateRecord
{
    protected static string $resource = TagResource::class;
}
