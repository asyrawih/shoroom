<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proses extends Model
{
    /**
     * @author hanan
     * di miliki oleh customer
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
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
     * @author hanan
     * di miliki oleh unit
     * @return BelongsTo
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /**
     * @author hanan
     * di miliki oleh user/employee/karyawan
     * @return BelongsTo
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
