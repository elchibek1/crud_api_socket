<?php

namespace App\Policies\Product;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole(['admin', 'editor']);
    }

    public function view(User $user, Product $product): bool
    {
        return $user->hasRole(['admin', 'editor']);
    }

    public function create(User $user): bool
    {
        return $user->hasRole(['admin', 'editor']);
    }

    public function update(User $user, Product $product): bool
    {
        return $user->hasRole(['admin', 'editor']);
    }

    public function delete(User $user, Product $product): bool
    {
        return $user->hasRole(['admin', 'editor']);
    }
}
