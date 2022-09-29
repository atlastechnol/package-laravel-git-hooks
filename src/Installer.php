<?php

namespace LaravelGitHooks\LaravelGitHooks;

class Installer
{

    public function install()
    {
        shell_exec("git config --global --add safe.directory /var/www");

        if (! $this->checkGitHookDir()) {
           shell_exec("mkdir ".$this->getGitHookDir());
           shell_exec("cp -R ".$this->getDirName().'/Utils/* '. $this->getGitHookDir() . DIRECTORY_SEPARATOR);
           shell_exec("chown 1000:1000 -R .gitHooks");
        }

        shell_exec("chmod +x " . $this->getGitHookDir() . DIRECTORY_SEPARATOR . '_' . DIRECTORY_SEPARATOR . 'hooks.sh');
        shell_exec("chmod +x " . $this->getGitHookDir() . DIRECTORY_SEPARATOR . 'pre-commit');
        shell_exec("git config core.hooksPath .gitHooks");

    }

    private function getGitHookDir()
    {

        $currentDir = $this->getDirName();

        $projectDir = $currentDir . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';

        return $projectDir . DIRECTORY_SEPARATOR . '.gitHooks';
    }

    private function checkGitHookDir()
    {
        return is_dir($this->getGitHookDir());
    }

    private function getDirName()
    {
        return dirname(__FILE__);
    }

}
