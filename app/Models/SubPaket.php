<?php

namespace App\Models;

use App\Observers\SubPaketObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubPaket extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'details',
        'images',
        'price',
        'paket_id'
    ];

    protected $casts = [
        'id' => 'string',
    ];
    public static function boot(): void
    {
        parent::boot();
        self::observe(SubPaketObserver::class);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
