<?php

namespace App\Helpers\Theme\Facades;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade as Facade;

/**
 * @method static init(string $view, string $asset, string $livewire)
 * @method static start(Request $request)
 * @method static getViewPath(): array
 * @method static publicPath(string $path = ''): string
 * @method static themePublicPath(string $theme, string $path = ''): string
 * @method static getList(): array
 * @method static getLangPath()
 * @method static getThemeConfig($themeName, $type = 'admin'): ?Collection
 */
class Theme extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'theme';
    }
}
