<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proses extends Model
{
    /**
     * @author hanan
     * di miliki oleh plant
     * @return BelongsTo
     */
    public function plant(): BelongsTo
    {
        return $this->belongsTo(Plant::class, 'plant_id');
    }

    /**
     * @author Hanan
     * 
     * prosess BelongsTo 
     * @return BelongsTo
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
