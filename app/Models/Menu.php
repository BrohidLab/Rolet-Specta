<?php

namespace App\Models;

use App\Observers\MenuObserver;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'name',
        'category',
        'jenis_makanan',
        'harga',
        'keterangan',
        'image'
    ];

    protected $casts = [
        'id' => 'string',
    ];

    public static function boot(): void {
        parent::boot();
        self::observe(MenuObserver::class);
    }
}