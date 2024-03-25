<?php

namespace App\Filament\Resources\PostCollectionResource\Pages;

use App\Filament\Resources\PostCollectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPostCollections extends ListRecords
{
    protected static string $resource = PostCollectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
