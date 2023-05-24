<?php

namespace App\Http\Controllers\Themes\Admin\Porto;

use App\Helpers\Theme\Facades\Theme;
use App\Http\Controllers\Controller;
use App\Models\ThemeType;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function list()
    {
//        \DB::table('theme_settings')->insert([
//            'theme_id' => 1,
//            'general' => json_encode(['setting1' => 'value1', 'setting2' => 'value2']),
//            'product' => json_encode(['setting1' => 'value1', 'setting2' => 'value2']),
//            'category' => json_encode(['setting1' => 'value1', 'setting2' => 'value2']),
//            'header' => json_encode(['setting1' => 'value1', 'setting2' => 'value2']),
//            'home' => json_encode(['setting1' => 'value1', 'setting2' => 'value2']),
//            'footer' => json_encode(['setting1' => 'value1', 'setting2' => 'value2']),
//            'appearance' => json_encode(['setting1' => 'value1', 'setting2' => 'value2']),
//        ]);
//        $themes = Theme::getList();
        $themes = ThemeType::with('themes')->get();
//        dd($allThemes);
        return view('theme.list',compact('themes'));
    }

    public function show($slug)
    {
        $theme = \App\Models\Theme::whereSlug($slug)->with('setting')->first();
//        $theme->settings = json_encode($theme->settings,true);
//        dd($theme);
        $keys = ['general', 'product', 'category', 'header', 'home', 'footer', 'payment', 'appearance'];

//        $settings = json_decode($theme->settings,true);
//        dd($theme->settings);
//
//        foreach($keys as $key){
////            dd($key,$theme->setting->general);
//            $settings[$key] = json_decode($theme->setting->$key, true);
//        }
//
//        $tabs = [
//            'general' => ['icon' => 'bx bx-cog', 'content' => $settings['general']],
//            'product' => ['icon' => 'bx bx-store', 'content' => $settings['product']],
//            'category' => ['icon' => 'bx bxs-category', 'content' => $settings['category']],
//            'header' => ['icon' => 'bx bx-dock-top', 'content' => $settings['header']],
//            'home' => ['icon' => 'bx bx-home-alt', 'content' => $settings['home']],
//            'footer' => ['icon' => 'bx bx-dock-bottom', 'content' => $settings['footer']],
//            'payment' => ['icon' => 'bx bxs-wallet-alt', 'content' => $settings['payment']],
//            'appearance' => ['icon' => 'bx bx-palette', 'content' => $settings['appearance']],
//        ];
//        dd($tabs);
        return view('theme.show', compact('theme'));
    }

    public function showAdmin($slug)
    {
//        dd(Theme::asset('asdad'));
        $settings = Theme::getThemeConfig($slug);
//        dd($slug,$settings);
//        dd($settings);
        return view('theme.show', compact('settings'));
    }

    public function showFrontend($slug)
    {
        $settings = Theme::getThemeConfig($slug, 'frontend');
//        dd($slug,$settings);
        return view('theme.show', compact('settings'));
    }
}
