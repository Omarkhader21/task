<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\PostView;
use Illuminate\Database\Eloquent\Model;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class PostOverview extends BaseWidget
{
    public ?Model $record = null;

    protected function getStats(): array
    {
        return [
            Card::make('Views', PostView::where('post_id', '=', $this->record->id)->count()),
            Card::make('Liked', '21%'),
            Card::make('Disliked', '3:12'),
        ];
    }
}
