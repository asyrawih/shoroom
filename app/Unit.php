<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{

    /**
     * @author hanan
     * Get Attribute Serial Number 
     * @return string
     */
    public function getSerialNumberAttribute()
    {
        return $this->sn_unit;
    }

    /**
     * @author hanan
     * 
     * Satu customer bisa memiliki banyak proses
     * @return HasMany
     */
    public function proses(): HasMany
    {
        return $this->hasMany(Proses::class, 'unit_id');
    }

    /**
     * @author hanan
     * 
     * Satu customer bisa memiliki banyak proses
     * @return BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     * @author hanan
     * 
     * Satu customer bisa memiliki banyak proses
     * @return BelongsTo
     */
    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant_id');
    }
}
