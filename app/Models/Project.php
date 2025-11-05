<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'images',
        'link',
        'display_order',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    protected $appends = [
        'primary_image',
    ];

    public function getPrimaryImageAttribute(): ?string
    {
        $images = $this->images ?? [];

        if (is_string($images)) {
            return $images;
        }

        if (! is_array($images)) {
            return null;
        }

        return $images[0] ?? null;
    }
}
