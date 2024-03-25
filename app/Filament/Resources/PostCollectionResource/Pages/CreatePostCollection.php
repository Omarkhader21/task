<?php

namespace App\Filament\Resources\PostCollectionResource\Pages;

use App\Filament\Resources\PostCollectionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePostCollection extends CreateRecord
{
    protected static string $resource = PostCollectionResource::class;
}
