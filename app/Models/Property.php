<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_type',
        'max_rooms',
        'beds',
        'baths',
        'price',
        'status',
        'area',
        'zip_code',
        'address',
        'city',
        'agent_id',
        'description',
        'additional_features',
    ];

    protected $casts = [
        'status' => 'string',
        'additional_features' => 'array',
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class, 'property_id');
    }
}
