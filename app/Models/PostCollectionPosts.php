<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCollectionPosts extends Model
{
    use HasFactory;

    protected $fillable = ['post_collection_id', 'post_id'];
}
