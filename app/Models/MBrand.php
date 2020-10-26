<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MBrand extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/m-brands/'.$this->getKey());
    }
}
