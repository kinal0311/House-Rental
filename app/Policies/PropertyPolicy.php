<?php
namespace App\Policies;

use App\Models\Property;
use App\Models\User;

class PropertyPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Property $property): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->role_id === 1 || $user->role_id === 2; // Only admins and agents can create
    }

    public function update(User $user, Property $property): bool
    {
        return $user->role_id === 1 || $user->id === $property->agent_id; // Admins or property owner
    }

    public function delete(User $user, Property $property): bool
    {
        return $user->role_id === 1 || $user->id === $property->agent_id; // Admins or property owner
    }
}
