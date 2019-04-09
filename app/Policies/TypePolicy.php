<?php

namespace App\Policies;

use App\User;
use App\Type;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the type.
     *
     * @param  \App\User  $user
     * @param  \App\Type  $type
     * @return mixed
     */
    public function view(User $user, Type $type)
    {
      if ($user->role_id === 5498)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    /**
     * Determine whether the user can create types.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
      if ($user->role_id === 5498)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    /**
     * Determine whether the user can update the type.
     *
     * @param  \App\User  $user
     * @param  \App\Type  $type
     * @return mixed
     */
    public function update(User $user, Type $type)
    {
      if ($user->role_id === 5498)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    /**
     * Determine whether the user can delete the type.
     *
     * @param  \App\User  $user
     * @param  \App\Type  $type
     * @return mixed
     */
    public function delete(User $user, Type $type)
    {
      if ($user->role_id === 5498)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    /**
     * Determine whether the user can restore the type.
     *
     * @param  \App\User  $user
     * @param  \App\Type  $type
     * @return mixed
     */
    public function restore(User $user, Type $type)
    {
      if ($user->role_id === 5498)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    /**
     * Determine whether the user can permanently delete the type.
     *
     * @param  \App\User  $user
     * @param  \App\Type  $type
     * @return mixed
     */
    public function forceDelete(User $user, Type $type)
    {
      if ($user->role_id === 5498)
      {
        return true;
      }
      else
      {
        return false;
      }
    }
}
