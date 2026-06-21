<?php

namespace App\Observers;

use App\Models\SubPaket;

class SubPaketObserver
{
    public function creating(SubPaket $data)
    {
        $data->id = generateUuid();
    }
}
