<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AdminPermissionsServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        try {
            Permission::get()->map(function ($permission) {
                Gate::define($permission->slug, function ($user) use ($permission) {
                    return $user->hasPermissionTo($permission);
                });
            });
        } catch (\Exception $e) {
            report($e);
            return false;
        }

        //Blade directives
//        Blade::directive('role', function ($role) {
//            return ""; //return this if statement inside php tag
//        });
//
//        Blade::directive('endrole', function ($role) {
//            return "endif;"; //return this endif statement inside php tag
//        });

        Blade::directive('role', function ($role) {
            return "<?php if(auth('admin')->check() && auth('admin')->user()->hasRole({$role})) : ?>";
        });
        Blade::directive('endrole', function () {
            return '<?php endif; ?>';
        });

    }
}
