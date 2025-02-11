<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cart extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = ['user_id', 'property_id'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
