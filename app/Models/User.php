<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'role_id',
        'email',
        'gender',
        'phone_number',
        'dob',
        'password',
        'status',
        'description',
        'address',
        'zip_code',
        'img'
    ];

    // Relationships
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function properties()
    {
        return $this->hasMany(Property::class, 'agent_id');
    }

    // Ensure the password is hashed before saving
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // JWT methods
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
?>
