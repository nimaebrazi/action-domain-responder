<?php

namespace App\Providers;

use App\Forum\Domain\User\Entity\UserEntity;
use App\Forum\Domain\User\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepository::class, function (){
            return new UserRepository(new UserEntity());
        });
    }
}
