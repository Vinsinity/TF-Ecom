<?php

namespace App\Helpers\Theme;

use App\Helpers\Theme\Exceptions\ThemeException;
use File;
use Illuminate\Container\Container;
use Illuminate\Contracts\Translation\Loader;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Vite;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\View\ViewFinderInterface;

class Theme {

    /**
     * @var Container
     */
    protected Container $app;
    /**
     * @var ViewFinderInterface
     */
    protected ViewFinderInterface $finder;
    /**
     * @var Loader
     */
    protected Loader $localeLoader;
    protected $config;
    protected $cache;
    protected $theme;
    public $assetPath;
    public $langPath;

    /**
     * @param Container $app
     * @param ViewFinderInterface $finder
     * @param Loader $localeLoader
     */
    public function __construct(Container $app, ViewFinderInterface $finder, Loader $localeLoader)
    {
        $this->app = $app;
        $this->finder = $finder;
        $this->localeLoader = $localeLoader;
    }

    /**
     * @param $theme
     * @param $asset
     * @param $livewire
     * @return void
     * @throws \App\Helpers\Theme\Exceptions\ThemeException
     */
//    public function init($theme,$asset,$livewire): void
//    {
//        if(empty($theme)) throw new ThemeException('Theme name should not be empty');
//        if(!is_dir($theme)) throw new ThemeException('Theme '.$theme.' not found');
//
//        $config = json_decode(File::get($theme.'/config.json'));
//        $view = $theme.'/'.config('theme.folder_container.views');
//        $lang = $theme.'/'.config('theme.folder_container.lang');
//        $layouts = $theme.'/'.config('theme.folder_container.layouts');
//        $livewireView = $theme.'/'.config('theme.folder_container.livewire');
////        dd($livewire);
//
//        // Add Theme View Path
//        $this->finder->addLocation($view);
//        $this->finder->addLocation($layouts);
//        $this->app['config']->set('livewire.view_path',$livewireView);
//        $this->app['config']->set('livewire.class_namespace',$livewire);
//        // Add Theme Locale
//        $loader = new FileLoader(new Filesystem(), $lang);
//
//        $translator = new Translator($loader, config('app.locale'));
//        $translator->setFallback(config('app.fallback_locale'));
//
//        $this->app->singleton('translator', function () use ($translator) {
//            return $translator;
//        });
//
//        // Vite Build Directory Change
//        $this->assetPath = $asset.'/assets/';
//        Vite::useBuildDirectory($asset);
//
//        // Change Livewire Paths
//        config(['livewire.view_path' => $livewireView]);
//        config(['livewire.class_namespace' => $livewire]);
//
//        // Add Livewire Views to ViewFinder
//        $this->finder->addLocation($livewireView);
//
//    }
    public function init($theme,$asset,$livewire): void
    {
        if(empty($theme)) throw new ThemeException('Theme name should not be empty');
        if(!is_dir($theme)) throw new ThemeException('Theme '.$theme.' not found');

        $config = json_decode(File::get($theme.'/config.json'));
        $view = $theme.'/'.config('theme.folder_container.views');
        $lang = $theme.'/'.config('theme.folder_container.lang');
        $layouts = $theme.'/'.config('theme.folder_container.layouts');
        $livewireView = $theme.'/'.config('theme.folder_container.livewire');

        // Add Theme View Path
        $this->finder->addLocation($view);
        $this->finder->addLocation($layouts);
        $this->finder->addLocation($livewireView);
        $this->app['config']->set('livewire.view_path',$livewireView);
        $this->app['config']->set('livewire.class_namespace',$livewire);
        config(['livewire.view_path' => $livewireView]);
        config(['livewire.class_namespace' => $livewire]);

        // Add Theme Locale
        $loader = new FileLoader(new Filesystem(), $lang);

        $translator = new Translator($loader, config('app.locale'));
        $translator->setFallback(config('app.fallback_locale'));

        $this->app->singleton('translator', function () use ($translator) {
            return $translator;
        });

        $this->assetPath = $asset.'/assets/';
        $this->langPath = $lang;
        Vite::useBuildDirectory($asset);
    }

    public function getViewPath(): array
    {
        return $this->finder->getPaths();
    }

    public function publicPath(string $path = ''): string
    {
//        app('url')->asset($path ? $this->assetPath.$path : $this->assetPath);
        return app('url')->asset($path ? $this->assetPath.$path : $this->assetPath);
    }

    public function getLangPath()
    {
        return $this->langPath;
    }

    public function themePublicPath(string $theme, $path = ''): string
    {

    }

    /**
     * Returns the list of available themes names in an array.
     *
     * @return array
     */
    public function getList(): array
    {
        $path = resource_path('themes');
        $list = [
            'admin' => [],
            'frontend' => []
        ];

        // read admin themes
        $admin_path = $path . '/admin';
        if (file_exists($admin_path)) {
            $admin_dir_list = dir($admin_path);
            while (false !== ($entry = $admin_dir_list->read())) {
                if (file_exists($admin_path . '/' . $entry . '/' . 'config.json')) {
                    $selected = ($entry === config('theme.admin_active_theme')) ? 1 : 0;
                    $config = $this->getThemeConfig($entry);
                    $list['admin'][] = [
                        'folder_name' => $entry,
                        'name' => $config['name'],
                        'selected' => $selected];
                }
            }
        }

        // read frontend themes
        $frontend_path = $path . '/frontend';
        if (file_exists($frontend_path)) {
            $frontend_dir_list = dir($frontend_path);
            while (false !== ($entry = $frontend_dir_list->read())) {
                if (file_exists($frontend_path . '/' . $entry . '/' . 'config.json')) {
                    $selected = ($entry === config('theme.frontend_active_theme')) ? 1 : 0;
                    $config = $this->getThemeConfig($entry,'frontend');
                    $list['frontend'][] = [
                        'folder_name' => $entry,
                        'name' => $config['name'],
                        'selected' => $selected
                    ];
                }
            }
        }

        return $list;
    }

    public function getThemeConfig($themeName, $type = 'admin'): ?Collection
    {
        $path = '/var/www/html/resources/themes/' . $type . '/' . $themeName . '/config.json';
        if (file_exists($path)) {
            $content = file_get_contents($path);
            return collect(json_decode($content, true));
        }
        return null;
    }

    /**
     * @param $path
     * @return array|mixed
     */
    private function _readConfig($path){
        if (file_exists($path))
            return include($path);

        return array();
    }

}
