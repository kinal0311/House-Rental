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
        'payment_type',       // Add payment_type to fillable array
        'token_amount',       // Add token_amount to fillable array
        'property_status',    // Add property_status to fillable array
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'string',
        'additional_features' => 'array',
        'payment_type' => 'integer',  // Cast payment_type as integer
        'token_amount' => 'decimal:2',  // Cast token_amount as decimal with 2 decimal places
        'property_status' => 'boolean', // Cast property_status as boolean (0 or 1)
    ];

    /**
     * Get the agent associated with the property.
     */
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    /**
     * Get the images associated with the property.
     */
    public function images()
    {
        return $this->hasMany(PropertyImg::class, 'property_id');
    }

    /**
     * Optionally, you can create an accessor to return the payment type as a string.
     */
    public function getPaymentTypeAttribute($value)
    {
        return $value === 1 ? '1' : '2';
    }
}
