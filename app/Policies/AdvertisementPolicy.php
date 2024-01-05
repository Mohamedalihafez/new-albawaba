<?php

namespace App\Policies;


use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvertisementPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function allowToShowAdvertisement()
    {
        return auth()->user()->hasPrivilege(VIEW_ADVERTISEMENT);
    }

    public function allowToUpsertAdvertisement()
    {
        return auth()->user()->hasPrivilege(UPSERT_ADVERTISEMENT);
    }

    public function allowToDeleteAdvertisement()
    {
        return auth()->user()->hasPrivilege(DELETE_ADVERTISEMENT);
    }
}
