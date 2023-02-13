<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessPhoto extends Model
{
    /**
     * Get the post that owns the comment.
     */
    public function business()
    {
        return $this->belongsTo(BusinessItem::class);
    }

    
    protected $fillable = [
        'business_id', 'photo'
    ];
}
