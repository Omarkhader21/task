<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\SocialMedia;
use Illuminate\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class AppLayout extends Component
{
    public Collection $categories;

    public function __construct(public ?string $metaTitle = null, public ?string $metaDescription = null)
    {
        $this->categories = Category::select('categories.id', 'categories.name', 'categories.slug', DB::raw('count(*) as total'))
            ->join('category_post', 'categories.id', '=', 'category_post.category_id')
            ->groupBy('categories.id')
            ->orderByDesc('total')
            ->limit(5)
            ->get();
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $socialMedia = SocialMedia::query()->where('status', '=', 1)->get();

        return view('layouts.app', compact('socialMedia'));
    }
}
