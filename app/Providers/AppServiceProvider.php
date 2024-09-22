<?php

namespace App\Providers;

use App\Http\View\Composers\RecentActivitiesComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);
        View::composer('Components.backendcomponents.header', RecentActivitiesComposer::class);
    }
}
