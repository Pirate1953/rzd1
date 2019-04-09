<?php

namespace App\Policies;

use App\User;
use App\Zone;
use Illuminate\Auth\Access\HandlesAuthorization;

class ZonePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the zone.
     *
     * @param  \App\User  $user
     * @param  \App\Zone  $zone
     * @return mixed
     */
    public function view(User $user, Zone $zone)
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
     * Determine whether the user can create zones.
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
     * Determine whether the user can update the zone.
     *
     * @param  \App\User  $user
     * @param  \App\Zone  $zone
     * @return mixed
     */
    public function update(User $user, Zone $zone)
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
     * Determine whether the user can delete the zone.
     *
     * @param  \App\User  $user
     * @param  \App\Zone  $zone
     * @return mixed
     */
    public function delete(User $user, Zone $zone)
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
     * Determine whether the user can restore the zone.
     *
     * @param  \App\User  $user
     * @param  \App\Zone  $zone
     * @return mixed
     */
    public function restore(User $user, Zone $zone)
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
     * Determine whether the user can permanently delete the zone.
     *
     * @param  \App\User  $user
     * @param  \App\Zone  $zone
     * @return mixed
     */
    public function forceDelete(User $user, Zone $zone)
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

    public function search(User $user)
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
