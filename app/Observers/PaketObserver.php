<?php

namespace App\Observers;

use App\Models\Paket;

class PaketObserver
{
    public function creating(Paket $data)
    {
        $data->id = generateUuid();
    }
}
