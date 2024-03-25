<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PostCollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'status',
        'created_at',
        'updated_at'
    ];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(
            Post::class,
            'post_collections_posts',
            'post_collection_id',
            'post_id'
        );
    }
}
