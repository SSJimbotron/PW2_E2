<?php

namespace App\Providers;

use App\Models\Activite;
use App\Models\Actualite;
use App\View\Composers\PostComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::share(["activites" => Activite::get(),"actualites" => Actualite::get()]);


    }
}
