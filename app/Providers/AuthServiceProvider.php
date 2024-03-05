<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Task;
use App\Policies\TaskPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Task::class => TaskPolicy::class, 
        // Comment::class => CommentPolicy::class,
        // User::class => UserPolicy::class,
        // Role::class => RolePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('edit-task', function ($user, $task){
            return $user->id === $task->user_id;
        });

        Gate::define('delete-task', function ($user, $task) {
            return $user->id === $task->user_id;
        });
    
        Gate::define('create-task', function ($user, $task) {
            return $user->id === $task->user_id;
        });
    
        Gate::define('view-task', function ($user, $task) {
            return $user->id === $task->user_id;
        });
    
        // Gate untuk Comment
    
        Gate::define('edit-comment', function ($user, $comment) {
            return $user->id === $comment->user_id;
        });
    
        Gate::define('delete-comment', function ($user, $comment) {
            return $user->id === $comment->user_id;
        });
    
        Gate::define('create-comment', function ($user,$comment) {
            return $user->id === $comment->user_id;
        });
    
        Gate::define('view-comment', function ($user, $comment) {
            return $user->id === $comment->user_id;
        });
    
        // Gate untuk User
        
    
        // Gate untuk Role        
    }
}
