<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Enums\UserRole;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $moduleName = 'Core';

    /**
     * @var string
     */
    protected $moduleNameLower = 'core';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerMailConfig();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));

        $loader = AliasLoader::getInstance();
        $loader->alias('Localization', \Modules\Core\Services\Localization\Localization::class);

        $loader->alias('role', \Spatie\Permission\Middlewares\RoleMiddleware::class);
        $loader->alias('permission', \Spatie\Permission\Middlewares\PermissionMiddleware::class);
        $loader->alias('role_or_permission', \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class);

        Gate::before(function ($user, $ability) {
            return $user->hasRole(UserRole::SuperAdmin->value) && $user->currentRole->name === UserRole::SuperAdmin->value;
        });

        Blade::componentNamespace('Modules\\Core\\View\\Components', 'core');

        VerifyEmail::toMailUsing(function (object $notifiable, string $verifyLink) {
            return (new MailMessage)->view(
                'core::mails.verfiy-email',
                ['verifyLink' => $verifyLink]
            );
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(ConfigServiceProvider::class);
        $this->app->register(FilamentAssetsServiceProvider::class);
        $this->app->register(SidebarServiceProvider::class);
        $this->app->register(WidgetsServiceProvider::class);

        $this->app['router']->aliasMiddleware('user.allowed', \Modules\Core\Http\Middleware\EnsureUserAccountIsAllowed::class);
        $this->app['router']->aliasMiddleware('verified', \Modules\Core\Http\Middleware\EnsureEmailIsVerified::class);

        // $this->app['router']->aliasMiddleware('localized', \Modules\Core\Services\Localization\Middleware\Localized::class);

        // $this->registerCustomModuleComponents();

    }

    protected function registerMailConfig()
    {
        $sourcePath = module_path($this->moduleName, 'Resources/views/templates/mail');

        Config::set([
            'mail.markdown.paths' => [
                $sourcePath,
            ],
        ]);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower.'.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'),
            $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/'.$this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath,
        ], ['views', $this->moduleNameLower.'-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/'.$this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
            $this->loadJsonTranslationsFrom($langPath);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
            $this->loadJsonTranslationsFrom(module_path($this->moduleName, 'Resources/lang'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path.'/modules/'.$this->moduleNameLower)) {
                $paths[] = $path.'/modules/'.$this->moduleNameLower;
            }
        }

        return $paths;
    }
}
