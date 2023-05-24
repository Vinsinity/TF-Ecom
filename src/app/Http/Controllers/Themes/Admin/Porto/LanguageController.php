<?php

namespace App\Http\Controllers\Themes\Admin\Porto;

use App\Helpers\Theme\Facades\Theme;
use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Session;

class LanguageController extends Controller
{
    public function setLanguage($lang)
    {
        Session::put('locale', $lang);
        return redirect()->back();
    }

    public function list()
    {
//        $languages = Language::all();
        $themesDirectory = '/var/www/html/resources/themes/';
        $themesTypes = glob($themesDirectory . '*', GLOB_ONLYDIR); // temaları al

        $translations = [];

        foreach ($themesTypes as $themesType) {
            $space = basename($themesType);
            $themes = glob($themesType . '/*', GLOB_ONLYDIR); // temaları al

            foreach ($themes as $theme) {
                $themeName = basename($theme); // tema adını al
                $locales = array_diff(scandir($theme . '/lang/'), array('..', '.')); // dilleri al
//                dd($locales);
                foreach ($locales as $locale) {
                    $files = array_diff(scandir($theme . '/lang/' . $locale), array('..', '.')); // dil dosyalarını al

                    foreach ($files as $file) {
                        $filename = pathinfo($file, PATHINFO_FILENAME); // dosya adını al (uzantısız)
                        $translations[$space][$themeName][$locale][$filename] = require $theme . '/lang/' . $locale . '/' . $file;
                    }
                }
            }
        }
        $array = $translations;
        return view('language.show', compact('translations','array'));
//        dd($translations);
//        dd(Theme::getLangPath());
//        dd($languages);
    }
}
