<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'content', 'admin_id', 'status', 'main_photo', 'meta_title', 'meta_description', 'sub_photos', 'created_at', 'updated_at', 'published_at'];

    protected $casts = ['sub_photos' => 'array', 'published_at' => 'datetime'];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getDateFormattedDate()
    {
        return $this->published_at->format('F jS Y');
    }

    public function shortBody($words = 30): string
    {
        return Str::words(strip_tags($this->content), $words);
    }

    public function findInShortBody(string $search): string
    {

        return Str::excerpt($this->content, $search);
    }

    public function getThumbnail()
    {
        if (str_starts_with($this->main_photo, 'http')) {
            return $this->main_photo;
        }

        if (!is_null($this->main_photo)) {
            return '/storage/' . $this->main_photo;
        } else {
            return asset('blog.png');
        }
    }

    public function humanReadTime(): Attribute
    {
        return new Attribute(
            get: function ($value, $attribute) {
                $words = Str::wordCount(strip_tags($attribute['content']));

                $minutes = ceil($words / 200);

                return $minutes . ' ' . str('min')->plural($minutes) . ', ' . $words . ' ' . str('words')->plural($words);
            }
        );
    }
}
