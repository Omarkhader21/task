<?php

namespace App\Filament\Resources\PostCollectionResource\Pages;

use App\Filament\Resources\PostCollectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPostCollection extends EditRecord
{
    protected static string $resource = PostCollectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
