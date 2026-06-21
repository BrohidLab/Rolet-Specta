<?php

namespace App\Models;

use App\Observers\PaketObserver;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'status'
    ];

    protected $casts = [
        'id' => 'string',
    ];
    public static function boot(): void
    {
        parent::boot();
        self::observe(PaketObserver::class);
    }
}
