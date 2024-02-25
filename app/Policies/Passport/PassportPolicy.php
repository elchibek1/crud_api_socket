<?php

namespace App\Policies\Passport;

use App\Models\Passport;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PassportPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole(['admin']);
    }

    public function view(User $user, Passport $passport): bool
    {
        return $user->hasRole(['admin']);
    }

    public function create(User $user): bool
    {
        return $user->hasRole(['admin']);
    }

    public function update(User $user, Passport $passport): bool
    {
        return $user->hasRole(['admin']);
    }

    public function delete(User $user, Passport $passport): bool
    {
        return $user->hasRole(['admin']);
    }
}
