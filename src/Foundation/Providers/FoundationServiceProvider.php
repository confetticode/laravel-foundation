<?php

namespace ConfettiCode\Laravel\Foundation\Providers;

use ConfettiCode\Laravel\Foundation\Console\Commands\MailTestCommand;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Dotenv\Command\DebugCommand;

class FoundationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'foundation');
        $this->commands([
            DebugCommand::class,
            MailTestCommand::class,
        ]);
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

    protected function registerMailTestCommand()
    {
        $this->app->singleton(MailTestCommand::class, function (Application $app) {
            return new MailTestCommand();
        });
    }
}
