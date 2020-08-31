<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    /**
     * Get Format For SOLD TO PARTY 
     * 
     * @return string
     * @author Hanan
     */
    public function getFormatStpAttribute() : string
    {
        return 'STP-' . $this->sold_to_party;
    }

    /**
     * Get Format for Sold to id
     * @return string 
     * @author hanan
     */
    public function getFormatStiAttribute() : string
    {
        return 'STI-' . $this->ship_to_id;
    }


}
