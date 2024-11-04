<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Service;
use App\Models\Packages;
use App\Models\UserPackage;
use Illuminate\Auth\Access\Response;
use App\View\Components\Business\Services;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Service $service)
    {
        
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, int $id)
    {
        if($user->role == 'admin') return Response::allow('Allowed');

        $userPack =  UserPackage::where('user_id', $user->id)->first();
        if($userPack){
                $allowed = $userPack->package->services;
                $listed = Service::where('user_id', $user->id)->where('listing_id', $id)->count();
                if($listed < $allowed){
                    return  Response::allow('Allowed');
                }else{
                    return Response::deny("limit");
                }
        }else{
                if(Packages::exists()){
                    return Response::deny("new");
                }else{
                        return Response::allow('Allowed');
                }
        }
       
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Service $service)
    {
        return $user->id == $service->user_id || $user->role == 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Service $service)
    {
        return $user->id == $service->user_id || $user->role == 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Service $service)
    {
         $user->role == 'admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Service $service)
    {
        $user->role == 'admin';
    }
}
