<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{

    /**
     * Get Format For SOLD TO PARTY 
     * 
     * @return string
     * @author Hanan
     */
    public function getFormatStpAttribute(): string
    {
        return 'STP-' . $this->sold_to_party;
    }

    /**
     * Get Format for Sold to id
     * @return string 
     * @author hanan
     */
    public function getFormatStiAttribute(): string
    {
        return 'STI-' . $this->ship_to_id;
    }

    /**
     * @author hanan
     * 
     * Satu customer bisa memiliki banyak proses
     * @return HasMany
     */
    public function proses(): HasMany
    {
        return $this->hasMany(Proses::class, 'customer_id');
    }

    /**
     * @author hanan
     * Customer memiliki Sales
     * @return BelongsTo
     */
    public function sales() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
