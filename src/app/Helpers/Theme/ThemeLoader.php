<?php

namespace App\Helpers\Theme;

use App\Helpers\Theme\Facades\Theme;
use Closure;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ThemeLoader
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Admin ve frontend için aktif temaları veritabanından çek
        $adminTheme = DB::table('themes')
            ->join('theme_types', 'themes.theme_type_id', '=', 'theme_types.id')
            ->where(['themes.status' => 1, 'themes.default' => 1, 'theme_types.slug' => 'admin'])
            ->select('themes.*')
            ->first();

        $frontendTheme = DB::table('themes')
            ->join('theme_types', 'themes.theme_type_id', '=', 'theme_types.id')
            ->where(['themes.status' => 1, 'themes.default' => 1, 'theme_types.slug' => 'frontend'])
            ->select('themes.*')
            ->first();

        // Tema dosyalarının bulunduğu dizinleri ayarla
        $admin = config('theme.admin_path') . $adminTheme->path;
        $frontend = config('theme.frontend_path') . $frontendTheme->path;
        $admin_asset = config('theme.admin_asset_path').$adminTheme->path;
        $frontend_asset = config('theme.frontend_asset_path').$frontendTheme->path;

        $admin_livewire = config('theme.admin_livewire_controllers').ucfirst($adminTheme->path).'\\Livewire';
        $frontend_livewire = config('theme.frontend_livewire_controllers').ucfirst($frontendTheme->path).'\\Livewire';

        // Gelen isteğe göre doğru tema yolunu belirle
        $path = $request->path();
        $themePath = $frontend;
        $assetPath = $frontend_asset;
        $livewireNamespace = $frontend_livewire;

//        dd($request);
        if (str_starts_with($path, 'admin/')) {
            $themePath = $admin;
            $assetPath = $admin_asset;
            $livewireNamespace = $admin_livewire;
        }
        if ($request->getContent()){
            $content = json_decode($request->getContent(), true);
            if (isset($content['fingerprint']) && isset($content['fingerprint']['path']) && str_starts_with($content['fingerprint']['path'], 'admin/')) {
                $themePath = $admin;
                $assetPath = $admin_asset;
                $livewireNamespace = $admin_livewire;
                // Diğer işlemler burada devam eder
            }
        }

        // Doğru tema yolunu kullanarak Theme sınıfını başlat
        try {
            Theme::init($themePath,$assetPath,$livewireNamespace);
        } catch (\Exception $e) {
            // Hata durumunda 404 sayfasına yönlendir
            abort(404);
        }

        return $next($request);
    }

//    public function handle(Request $request, Closure $next): Response
//    {
//        $admin = config('theme.admin_path').config('theme.admin_active_theme');
//        $frontend = config('theme.frontend_path').config('theme.frontend_active_theme');
//
//        $admin_asset = config('theme.admin_asset_path').config('theme.admin_active_theme');
//        $frontend_asset = config('theme.frontend_asset_path').config('theme.frontend_active_theme');
//
//        $admin_livewire = config('theme.admin_livewire_controllers').ucfirst(config('theme.admin_active_theme')).'\\Livewire';
//        $frontend_livewire = config('theme.frontend_livewire_controllers').ucfirst(config('theme.frontend_active_theme')).'\\Livewire';
//
//        // Gelen isteğe göre doğru tema yolunu belirle
//        $path = $request->path();
//        $themePath = $frontend;
//        $assetPath = $frontend_asset;
//        $livewireNamespace = $frontend_livewire;
//
//        if (str_starts_with($path, 'admin/')) {
//            $themePath = $admin;
//            $assetPath = $admin_asset;
//            $livewireNamespace = $admin_livewire;
//        }
//        if ($request->getContent()){
//            $content = json_decode($request->getContent(), true);
//            if (isset($content['fingerprint']) && isset($content['fingerprint']['path']) && str_starts_with($content['fingerprint']['path'], 'admin/')) {
//                $themePath = $admin;
//                $assetPath = $admin_asset;
//                $livewireNamespace = $admin_livewire;
//                // Diğer işlemler burada devam eder
//            }
//        }
//
//        // Doğru tema yolunu kullanarak Theme sınıfını başlat
//        try {
//            Theme::init($themePath, $assetPath, $livewireNamespace);
//        } catch (\Exception $e) {
//            // Hata durumunda 404 sayfasına yönlendir
//            abort(404);
//        }
//
//        return $next($request);
//    }
}
