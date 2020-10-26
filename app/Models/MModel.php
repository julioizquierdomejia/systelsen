<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MModel extends Model
{
    protected $fillable = [
        'name',
        'description',
        'enabled',
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/m-models/'.$this->getKey());
    }
}
