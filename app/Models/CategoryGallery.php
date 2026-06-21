<?php

namespace App\Models;

use App\Observers\CategoryGalleryObserver;
use Illuminate\Database\Eloquent\Model;

class CategoryGallery extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name'
    ];

    protected $casts = [
        'id' => 'string',
    ];
    public static function boot(): void
    {
        parent::boot();
        self::observe(CategoryGalleryObserver::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
