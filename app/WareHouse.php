<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WareHouse extends Model
{

    protected $casts = [
        'date_gi'   => 'date',
        'date_recv' => 'date',
    ];

    public static $status = [
        'Ready To Pickup' => 'Ready To Pickup',
        'Taken'           => 'Taken'
    ];

    public function getFormatDateAttribute()
    {
        return $this->date_gi->format('d F Y');
    }

    public function getFormatRecvAttribute()
    {
        return $this->date_recv->format('d F Y') ?? "-";
    }

    public function getCurrentDateAttribute()
    {
        return now()->format('d F Y');
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

    public function getSales()
    {
        return $this->customer->sales;
    }
}
