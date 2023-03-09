<?php

namespace Illuminate\Pipeline;

use Illuminate\Contracts\Pipeline\Hub as PipelineHubContract;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PipelineServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
<<<<<<< Updated upstream
            PipelineHubContract::class, Hub::class
        );
=======
            PipelineHubContract::class,
            Hub::class
        );

        $this->app->bind('pipeline', fn ($app) => new Pipeline($app));
>>>>>>> Stashed changes
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            PipelineHubContract::class,
<<<<<<< Updated upstream
=======
            'pipeline',
>>>>>>> Stashed changes
        ];
    }
}
