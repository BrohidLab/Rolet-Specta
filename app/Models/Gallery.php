<?php

namespace App\Models;

use App\Observers\GalleryOserver;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'title',
        'alt',
        'type',
        'image',
        'video'
    ];

    protected $casts = [
        'id' => 'string',
    ];
    public static function boot(): void {
        parent::boot();
        self::observe(GalleryOserver::class);
    }

}