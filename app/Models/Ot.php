<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ot extends Model
{
    protected $fillable = [
        'client_id',
        'date',
        'seller',
        'motor_id',
        'status',
    
    ];
    
    
    protected $dates = [
        'date',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    public function client_id()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }
    public function motor_id()
    {
        return $this->belongsTo('App\Models\Motor', 'motor_id');
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/ots/'.$this->getKey());
    }
}
