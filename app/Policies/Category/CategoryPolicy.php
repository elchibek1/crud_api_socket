<?php

namespace App\Policies\Category;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole(['admin', 'editor']);
    }

    public function view(User $user, Category $category): bool
    {
        return $user->hasRole(['admin', 'editor']);
    }

    public function create(User $user): bool
    {
        return $user->hasRole(['admin', 'editor']);
    }

    public function update(User $user, Category $category): bool
    {
        return $user->hasRole(['admin', 'editor']);
    }

    public function delete(User $user, Category $category): bool
    {
        return $user->hasRole(['admin', 'editor']);
    }

}
