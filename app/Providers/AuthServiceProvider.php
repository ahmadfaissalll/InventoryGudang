<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\{User, Note};
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
  /**
   * The model to policy mappings for the application.
   *
   * @var array<class-string, class-string>
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

    // used in verification on update, delete note
    Gate::define('manipulate', function(User $user, Note $note) {
      return $user->id == $note->id_user;
    });
  }
}
