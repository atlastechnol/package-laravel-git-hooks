<?php

namespace LaravelGitHooks\LaravelGitHooks;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'laravel-git-hooks:install';
    protected $description = 'Install and integrate to git hook';

    public function handle()
    {
        try {
            $installer = new Installer();
            $installer->install();

            $this->info("Package Laravel Git Hook Installed Successfully...");
        }
        catch (\Exception $e)
        {
            $this->error($e->getMessage());
        }
    }

}
