<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyImg extends Model
{
    use SoftDeletes;

    // Define the table name (if it doesn't follow Laravel's naming convention)
    protected $table = 'property_image';

    // Specify the fields that are mass-assignable
    protected $fillable = [
        'property_id',
        'image_url',
        'alt_text',
    ];

    protected $casts = [
        'alt_text' => 'string',
    ];

    /**
     * Define the relationship between PropertyImage and Property.
     * Each PropertyImage belongs to one Property.
     */
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
