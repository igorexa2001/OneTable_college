<?php

namespace App\Providers;

use App\Models\Category;
use App\Settings;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Settings::class, function () {
            return Settings::make(storage_path('app/settings.json'));
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $settings = Settings::make(storage_path('app/settings.json'));
        $settings->put([
            'phone' => '8(800)555-35-35',
            'address' => "We're still behind u",
            'email' => 'one.table@example.com',
        ]);

        View::share(
            ['settings', $settings->all()]
        );
    }
}
