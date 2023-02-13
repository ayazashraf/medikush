<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'summary','description','seotitle','url','metadescription','seo_bots','status','keywords','featured_image'
    ];
}
