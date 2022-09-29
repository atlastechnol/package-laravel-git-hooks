<?php

namespace LaravelGitHooks\LaravelGitHooks;

use Illuminate\Support\ServiceProvider;

class HookServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->commands([
            InstallCommand::class,
        ]);
    }
}
