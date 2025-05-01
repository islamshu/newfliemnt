<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SubCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubCategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('view_any_subcategory');
    }

    public function view(User $user, SubCategory $subCategory)
    {
        return $user->can('view_subcategory');
    }

    public function create(User $user)
    {
        return $user->can('create_subcategory');
    }

    public function update(User $user, SubCategory $subCategory)
    {
        return $user->can('update_subcategory');
    }

    public function delete(User $user, SubCategory $subCategory)
    {
        return $user->can('delete_subcategory');
    }
}