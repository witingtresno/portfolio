<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'job',
        'image',
        'contact',
        'bio',
        'email',
        'facebook',
        'instagram',
        'linkedin',
        'github',
        'about_me',
        'resume_link',
    ];
}
