<?php

namespace App\Models;

use App\Traits\HasTranslatedPages;
use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory, HasTranslations, HasTranslatedPages;

    protected $appends = [
        'translations_array',
        'translations_slugs',
        'current_translation',
        'default_title'
    ];
}
