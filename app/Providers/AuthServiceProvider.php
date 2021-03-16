<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define("admin",function(User $user){
            // $user is same as auth()->user()
           return $user->isAdmin=="1";//true or false

        });

        Gate::define("premiumAdminPostowner",function(User $user,$id){
             // $user is same as auth()->user()
            //(OR gate)
            //premium user
            //admin
            //post owner->post id->user_id->user_id==currentuser_id
            $postData=Post::find($id);
            $postOwnerId=$postData->user_id;
            return $user->isAdmin=='1' || $user->isPremium=='1' || $user->id==$postOwnerId;//to see delete,editpost btn       
        });
       
    }
}
