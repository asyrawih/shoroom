<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Fields\BelongsTo;

class WareHouse extends Model
{

    protected $casts = [
        'date_gi' => 'date',
    ];

    public function getFormatDateAttribute()
    {
        return $this->date_gi->format('d F Y');
    }

    /**
     * BelongSto WareHouseMen on Table User
     * @return BelongsTo;
     */
    public function warehouse()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * BelongsTo Customer 
     * @return BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
