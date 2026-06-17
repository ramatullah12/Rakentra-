<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // Force HTTPS on production (Vercel runs behind HTTPS proxy)
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        if (config('app.env') === 'production') {
            config(['session.driver' => 'cookie']);
            config(['logging.default' => 'stderr']);
            config(['view.compiled' => '/tmp/storage/framework/views']);
            
            if (!is_dir('/tmp/storage/framework/views')) {
                mkdir('/tmp/storage/framework/views', 0755, true);
            }
        }
    }
}
