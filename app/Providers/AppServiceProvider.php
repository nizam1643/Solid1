<?php

namespace App\Providers;

use App\Interface\PostInterface;
use App\Interface\Send;
use App\Interface\SendEmailInterface;
use App\Repository\PostRepository;
use App\Repository\SendEmailRepository;
use App\Repository\StudentRepository;
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
        $this->app->bind(PostInterface::class, PostRepository::class);
        $this->app->bind(StudentInterface::class, StudentRepository::class);
        $this->app->bind(SendEmailInterface::class, SendEmailRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
