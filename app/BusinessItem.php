<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessItem extends Model
{
    /**
     * Get the Business that owns the Items.
     */
    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function type()
    {
        return $this->belongsTo(BusinessItemType::class, 'item_type_id','id');
    }

    public function photos()
    {
        return $this->hasMany(BusinessPhoto::class);
    }
    
    protected $fillable = [
        'name'
    ];
}
