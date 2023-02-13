<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessType extends Model
{
    /**
     * Get the post that owns the business.
     */
    public function business()
    {
        return $this->belongsTo(Business::class, 'id', 'business_id');
    }
}
