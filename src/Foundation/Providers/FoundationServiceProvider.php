<?php

namespace ConfettiCode\Laravel\Foundation\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Dotenv\Command\DebugCommand;

class FoundationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->commands(DebugCommand::class);
    }

    public function register()
    {
        $this->registerDebugDotenvCommand();
    }

    protected function registerDebugDotenvCommand()
    {
        $this->app->singleton(DebugCommand::class, function (Application $app) {
            return new DebugCommand($app->environment(), $app->basePath());
        });
    }
}
