<?php

namespace App\Providers;

use Google\Cloud\BigQuery\BigQueryClient;
use Illuminate\Support\ServiceProvider;

// class AppServiceProvider extends ServiceProvider
// {
//     /**
//      * Register any application services.
//      */
//     public function register(): void
//     {
//         //
//     }

//     /**
//      * Bootstrap any application services.
//      */
//     public function boot(): void
//     {
//         //
//     }
// }

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BigQueryClient::class, function ($app) {
            // Set the environment variable programmatically
            putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path(env('GOOGLE_CLOUD_KEY_FILE')));

            return new BigQueryClient([
                'projectId' => env('GOOGLE_CLOUD_PROJECT_ID'),
            ]);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}