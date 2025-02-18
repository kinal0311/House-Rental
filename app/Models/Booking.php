<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'property_id',
        'user_id',
        'agent_id',
        'payment_option',
        'payment_status',
        'deposit',
        'amount'
    ];

    /**
     * Relationship with Property model
     */
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    /**
     * Relationship with User model (Booking User)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relationship with Agent (User model)
     */
    public function agentUser() // Updated method name for clarity
    {
        return $this->belongsTo(User::class, 'agent_id'); // Ensure we're using 'agent_id'
    }

    /**
     * Accessor for Payment Option (can return descriptive text instead of just numbers)
     */
    public function getPaymentOptionTextAttribute()
    {
        $options = [
            1 => 'Credit Card',
            2 => 'Cash',
        ];

        return $options[$this->payment_option] ?? 'Unknown';
    }

    /**
     * Accessor for Payment Status
     */
    public function getPaymentStatusTextAttribute()
    {
        $statuses = [
            1 => 'Pending',
            2 => 'Completed',
            3 => 'Failed'
        ];

        return $statuses[$this->payment_status] ?? 'Unknown';
    }
}

?>
