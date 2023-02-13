<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
     /**
     * Get the photos for the business.
     */
    public function photos()
    {
        return $this->hasMany(BusinessPhoto::class);
    }
     /**
     * Get the unit type for the business.
     */
    public function type()
    {
        return $this->hasOne(BusinessType::class,'id','business_type_id');
        
    }
      /**
     * Get the items for the business.
     */
    public function items()
    {
        return $this->hasMany(BusinessItem::class);
        
    }
    /**
     * Get the videos for the business.
     */
    public function videos()
    {
        return $this->hasMany(BusinessVideo::class);
        
    }
    protected $fillable = [
        'name', 'street_number','street_name','seo_title','url','metadescription','zip_postal','city'
    ];
}
