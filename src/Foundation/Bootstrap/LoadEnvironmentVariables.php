<?php

namespace ConfettiCode\Laravel\Foundation\Bootstrap;

use Illuminate\Contracts\Foundation\Application;
use Symfony\Component\Dotenv\Dotenv;

class LoadEnvironmentVariables
{
    /**
     * Bootstrap the given application.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function bootstrap(Application $app)
    {
        if ($app->configurationIsCached()) {
            return;
        }

        $dotenv = new Dotenv();
        $dotenv->load($app->environmentPath() . DIRECTORY_SEPARATOR . $app->environmentFile());
    }
}
