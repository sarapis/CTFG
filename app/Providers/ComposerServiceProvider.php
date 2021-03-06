<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
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
        view()->composer(
            '*', 'App\Http\ViewComposers\Categories',
        );

        /*view()->composer(
            '*', 'App\Http\ViewComposers\CategoryHierarchies',
        );

        view()->composer(
            '*', 'App\Http\ViewComposers\TagHierarchies',
        ); */

        view()->composer(
            '*', 'App\Http\ViewComposers\ListingTypes',
        );

        view()->composer(
            '*', 'App\Http\ViewComposers\OrganizationTypes',
        );

        view()->composer(
            ['welcome', 'projects.projects-by-category', 'projects.projects-by-tag', 'projects.search-results'],
            'App\Http\ViewComposers\Tags'
        );

        view()->composer(
            ['welcome', 'projects.projects-by-category', 'projects.projects-by-tag', 'projects.search-results'],
            'App\Http\ViewComposers\Countries'
        );
    }
}
