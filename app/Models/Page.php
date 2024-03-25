<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'content', 'image', 'status', 'admin_id', 'created_at', 'updated_at'];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}
