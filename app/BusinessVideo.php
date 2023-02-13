<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessVideo extends Model
{
    /**
     * Get the business that owns the videos.
     */
    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    protected $fillable = [
        'name'
    ];
}
