<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') === 'production' && isset($_SERVER['VERCEL_URL'])) {
            config(['session.driver' => 'cookie']);
            config(['logging.default' => 'stderr']);
            config(['view.compiled' => '/tmp/storage/framework/views']);
            
            if (!is_dir('/tmp/storage/framework/views')) {
                mkdir('/tmp/storage/framework/views', 0755, true);
            }
        }
    }
}
