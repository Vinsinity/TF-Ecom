<?php

$controller_namespace = config('theme.admin_controllers').ucfirst(config('theme.admin_active_theme')).'\\';

Route::get('test',function () {
    \App\Models\Language::insert([
        ['name' => 'Türkçe', 'shortname' => 'TR', 'status' => 1],
        ['name' => 'English', 'shortname' => 'EN', 'status' => 1],
        ['name' => 'Dutch', 'shortname' => 'DE', 'status' => 1],
        ['name' => 'Arabic', 'shortname' => 'AR', 'status' => 1],
    ]);

    return 'tamam';
});

// Admin Prefix
Route::prefix('admin')->name('admin.')->group(function () use ($controller_namespace) {

    // Auth Prefix
    Route::prefix('auth')->controller($controller_namespace.'AuthController')->name('auth.')->group(function () {
        Route::get('login','login')->name('login');
        Route::post('login','loginPost')->name('login.post');
        Route::post('logout','logout')->name('logout');
    });

    // Admin Middleware
    Route::middleware('auth.admin')->group(function () use ($controller_namespace) {
        // Dashboard
        Route::prefix('dashboard')->controller($controller_namespace.'DashboardController')->name('dashboard.')->group(function () {
            Route::get('/','index')->name('index');
        });

        // Language
        Route::prefix('lang')->controller($controller_namespace.'LanguageController')->name('language.')->group(function () {
            Route::get('set/{lang}','setLanguage')->name('set');
        });

        // Categories
        Route::prefix('categories')->controller($controller_namespace.'CategoryController')->name('categories.')->group(function (){
            Route::get('list','list')->name('list');
            Route::get('add','add')->name('add');
            Route::post('add','addPost')->name('add.post');
            Route::get('show/{slug}','show')->name('show');
            Route::post('update/{slug}','update')->name('update');
            Route::get('subs/{slug}','subs')->name('subs');
            Route::get('add/{slug}','subsAdd')->name('subs.add');
            Route::post('add/{slug}','subsAddPost')->name('subs.add.post');
        });

        // Brands
        Route::prefix('brands')->controller($controller_namespace.'BrandController')->name('brands.')->group(function (){
            Route::get('list','list')->name('list');
            Route::get('add','add')->name('add');
        });

        // Products
        Route::prefix('products')->controller($controller_namespace.'ProductController')->name('products.')->group(function () use ($controller_namespace) {
            Route::get('list','list')->name('list');
            Route::get('show/{slug}','show')->name('show');
            Route::get('add','add')->name('add');
            Route::get('update','update')->name('update');
        });

        // Variants
        Route::prefix('variants')->controller($controller_namespace.'VariantController')->name('variants.')->group(function () {
            Route::get('add','add')->name('add');
            Route::post('add','addPost')->name('add.post');
            Route::get('list','list')->name('list');
            Route::get('edit/{slug}','edit')->name('edit');
            Route::get('list/{slug}','values')->name('values');
            Route::get('add/{slug}','addValue')->name('add.value');
            Route::post('add/{slug}','addValuePost')->name('add.value.post');
        });

        // Orders
        Route::prefix('orders')->controller($controller_namespace.'OrderController')->name('orders.')->group(function (){
            Route::get('list','list')->name('list');
            Route::get('show/{id}','show')->name('show');
            Route::get('invoice/{id}','invoice')->name('invoice');
        });

        // Campaigns
        Route::prefix('campaigns')->name('campaigns.')->group(function () use ($controller_namespace) {

            // Code
            Route::prefix('code')->name('code.')->controller($controller_namespace.'CampaignController')->group(function () {
                Route::get('list','code')->name('list');
                Route::get('add','codeAdd')->name('add');
                Route::post('add','codeAddPost')->name('add.post');
            });

            // Product
            Route::prefix('product')->name('product.')->controller($controller_namespace.'ProductCampaignController')->group(function (){
                Route::get('list','list')->name('list');
                Route::get('cart','cart')->name('cart');
                Route::get('category','category')->name('category');
                Route::get('brand','brand')->name('brand');
            });
        });

        // Pages
        Route::prefix('pages')->name('pages.')->controller($controller_namespace.'PageController')->group(function () {
            Route::get('list','list')->name('list');
            Route::get('add','add')->name('add');
            Route::post('add','addPost')->name('add.post');
        });

        // Role Middleware
        Route::middleware('role:owner')->group(function () use ($controller_namespace) {

            // Users
            Route::prefix('users')->controller($controller_namespace.'UserController')->name('users.')->group(function (){
                Route::get('list','list')->name('list');
            });

            // Admins
            Route::prefix('admins')->controller($controller_namespace.'AdminController')->name('admins.')->group(function (){
                Route::get('list','list')->name('list');
                Route::get('add','add')->name('add');
                Route::post('add','addPost')->name('add.post');
            });

            // Roles
            Route::prefix('roles')->controller($controller_namespace.'RoleController')->name('roles.')->group(function (){

                // User Roles
                Route::prefix('users')->name('users.')->group(function () {
                    Route::get('list','roles')->name('list');
                    Route::get('add','add')->name('add');
                    Route::post('add','addPost')->name('addPost');
                });

                // Admin Roles
                Route::prefix('admins')->name('admins.')->group(function () {
                    Route::get('list','adminRoles')->name('list');
                    Route::get('add','adminAdd')->name('add');
                    Route::post('add','adminAddPost')->name('addPost');
                });
                Route::get('list','roles')->name('list');
                Route::get('add','add')->name('add');
                Route::post('add','addPost')->name('addPost');
                Route::get('show/{slug}','show')->name('show');
            });

            // Permissions
            Route::prefix('permissions')->controller($controller_namespace.'PermissionController')->name('permissions.')->group(function (){
                Route::prefix('users')->name('users.')->group(function () {
                    Route::get('list','permissions')->name('list');
                    Route::get('add','add')->name('add');
                    Route::post('add','addPost')->name('addPost');
                });
                Route::prefix('admins')->name('admins.')->group(function () {
                    Route::get('list','adminPermissions')->name('list');
                    Route::get('add','adminAdd')->name('add');
                    Route::post('add','adminAddPost')->name('addPost');
                });
                Route::get('list','permissions')->name('list');
                Route::get('add','add')->name('add');
                Route::post('add','addPost')->name('addPost');
            });

            // Settings
            Route::prefix('settings')->controller($controller_namespace.'SettingController')->name('settings.')->group(function () use ($controller_namespace) {
                Route::get('seo','seo')->name('seo');
                Route::post('seo','seoPost')->name('seo.store');
                Route::get('company','company')->name('company');
                Route::post('company','companyPost')->name('company.post');

                Route::prefix('cargo')->name('cargo.')->group(function (){
                    Route::get('list','cargo')->name('list');
                    Route::get('add','cargoAdd')->name('add');
                    Route::post('post','cargoPost')->name('post');
                });

                Route::prefix('themes')->controller($controller_namespace.'ThemeController')->name('themes.')->group(function () {
                    Route::get('list','list')->name('list');
                    Route::get('show/{slug}','show')->name('show');
//                    Route::prefix('show')->name('show.')->group(function () {
//                        Route::get('admin/{slug}','showAdmin')->name('admin');
//                        Route::get('frontend/{slug}','showFrontend')->name('frontend');
//                    });
                });

                Route::prefix('languages')->controller($controller_namespace.'LanguageController')->name('languages.')->group(function () {
                    Route::get('list','list')->name('list');
                });

                Route::prefix('languages')->controller($controller_namespace.'LanguageController')->name('languages.')->group(function () {
                    Route::get('list','list')->name('list');
                });

                Route::prefix('currencies')->controller($controller_namespace.'CurrencyController')->name('currencies.')->group(function () {
                    Route::get('list','list')->name('list');
                });

                Route::prefix('slide')->name('slide.')->group(function () {
                    Route::get('list','slideList')->name('list');
                    Route::get('add','slideAddForm')->name('add');
                    Route::post('add','slideAdd')->name('add.post');
                    Route::post('update','slideUpdate')->name('update');
                });
            });

            // Payment
            Route::prefix('payment')->controller($controller_namespace.'PaymentController')->name('payment.')->group(function () use ($controller_namespace) {
                Route::prefix('bank-account')->name('banknaccount.')->group(function () {
                    Route::get('accounts','accounts')->name('accounts');
                });
                Route::prefix('pos')->name('pos.')->group(function () {
                    Route::get('list','list')->name('list');
                });
                Route::prefix('types')->name('types.')->group(function () {
                    Route::get('list','typeList')->name('list');
                    Route::get('show/{slug}','typeShow')->name('show');

                    Route::prefix('method')->name('method.')->group(function () {
                        Route::get('{slug}','methodList')->name('list');
                        Route::get('show/{method}','methodShow')->name('show');
                    });
                });
            });
        });
    });
});
