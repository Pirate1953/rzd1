<?php

namespace App\Policies;

use App\User;
use App\Station;
use App\Usercard;
use Illuminate\Auth\Access\HandlesAuthorization;

class StationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the station.
     *
     * @param  \App\User  $user
     * @param  \App\Station  $station
     * @return mixed
     */
    public function view(User $user, Station $station)
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
     * Determine whether the user can create stations.
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
     * Determine whether the user can update the station.
     *
     * @param  \App\User  $user
     * @param  \App\Station  $station
     * @return mixed
     */
    public function update(User $user, Station $station)
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
     * Determine whether the user can delete the station.
     *
     * @param  \App\User  $user
     * @param  \App\Station  $station
     * @return mixed
     */
    public function delete(User $user, Station $station)
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
     * Determine whether the user can restore the station.
     *
     * @param  \App\User  $user
     * @param  \App\Station  $station
     * @return mixed
     */
    public function restore(User $user, Station $station)
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
     * Determine whether the user can permanently delete the station.
     *
     * @param  \App\User  $user
     * @param  \App\Station  $station
     * @return mixed
     */
    public function forceDelete(User $user, Station $station)
    {
      if ($user->role_id === 6778)
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

    public function storepassport(User $user)
    {
      if ($user->role_id === 6778)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function cards(User $user)
    {
      if (($user->role_id === 6778) && ($user->userstat_id === 2))
      {
        return true;
      }
      else
      {
        return false;
      }
    }
}
