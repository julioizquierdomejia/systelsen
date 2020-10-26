<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $fillable = [
        'description',
        'code',
        'brand_id',
        'model_id',
        'power_number',
        'power_measurement',
        'volt',
        'speed',
        'status',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    public function brand_id()
    {
        return $this->belongsTo('App\Models\MBrand', 'brand_id');
    }
    public function model_id()
    {
        return $this->belongsTo('App\Models\MModel', 'model_id');
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/motors/'.$this->getKey());
    }
}
