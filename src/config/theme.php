<?php

return array(
    /*
    |--------------------------------------------------------------------------
    | Path to directory with themes
    |--------------------------------------------------------------------------
    |
    | The directory with your themes.
    |
    */

    'path' => resource_path('themes/'),
    'admin_path' => resource_path('themes/admin/'),
    'frontend_path' => resource_path('themes/frontend/'),

    'admin_asset_path' => 'themes/admin/',
    'frontend_asset_path' => 'themes/frontend/',

    'admin_controllers' => '\\App\\Http\\Controllers\\Themes\\Admin\\',
    'frontend_controllers' => '\\App\\Http\\Controllers\\Themes\\Frontend\\',

    'admin_livewire_controllers' => 'App\\Http\\Controllers\\Themes\\Admin\\',
    'frontend_livewire_controllers' => 'App\\Http\\Controllers\\Themes\\Frontend\\',

    'default_theme' => 'default',
    'admin_active_theme' => 'porto',
    'frontend_active_theme' => 'molla',

    'folder_container' => array(
        'assets' => 'assets',
        'layouts' => 'layouts',
        'lang' => 'lang',
        'livewire' => 'livewire',
        'views' => 'views'
    ),

    'admin' => array(
        'active' => 'porto',
        'controllers' => '\\App\\Http\\Controllers\\Themes\\Admin\\',
        'view' => resource_path('themes/admin/'),
        'path' => 'themes/admin/'
    ),

    'frontend' => array(
        'active' => 'molla',
        'controllers' => '\\App\\Http\\Controllers\\Themes\\Frontend\\',
        'view' => resource_path('themes/frontend/'),
        'path' => 'themes/frontend/'
    ),

    'folders' => array(
        'assets' => '/assets',
        'layouts' => '/layouts',
        'language' => '/lang',
        'livewire' => '/livewire',
        'views' => '/views'
    )
);
