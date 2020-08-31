<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
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
}
