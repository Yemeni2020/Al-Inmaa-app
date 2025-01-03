<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $verticalMenuJson = file_get_contents(base_path('resources/data/menus/vertical-menu.json'));
        $verticalMenuData = json_decode($verticalMenuJson);
        $horizontalMenuJson = file_get_contents(base_path('resources/data/menus/horizontal-menu.json'));
        $horizontalMenuData = json_decode($horizontalMenuJson);
        $verticalMenuBoxiconsJson = file_get_contents(base_path('resources/data/menus/vertical-menu-boxicons.json'));
        $verticalMenuBoxiconsData = json_decode($verticalMenuBoxiconsJson);
        // $verticalOverlayMenu = file_get_contents(base_path('resources/data/menus/vertical-overlay-menu.json'));
        // $verticalOverlayMenuData = json_decode($verticalOverlayMenu);

        // share all menuData to all the views
        \View::share('menuData', [$verticalMenuData, $horizontalMenuData, $verticalMenuBoxiconsData]);
    }
}
