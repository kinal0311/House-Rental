<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes;


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
        // 'media',
        'additional_features'
    ];

    // Accessor for media field to return full URL
    // public function getMediaAttribute($value)
    // {
    //     return $value ? asset('assets/images/products/' . $value) : null; // Assuming media is stored in public/storage
    // }

    protected $casts = [
        'status' => 'string',
        'additional_features' => 'array',
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }



}
