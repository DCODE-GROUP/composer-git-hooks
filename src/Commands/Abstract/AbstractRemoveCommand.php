<?php

namespace Dcodegroup\GitHooks\Commands\Abstract;

use Symfony\Component\Console\Input\InputInterface;

abstract class AbstractRemoveCommand extends AbstractCommand
{
    protected $force;
    protected $lockFileHooks;
    protected $hooksToRemove;
    
    protected function init(InputInterface $input)
    {
        $this->force = $input->getOption('force');
        $this->lockFileHooks = file_exists($this->lockFile)
            ? array_flip(json_decode(file_get_contents($this->lockFile)))
            : [];
        $hooks = $input->getArgument('hooks');
        $this->hooksToRemove = empty($hooks) ? array_keys($this->hooks) : $hooks;
    }

    protected function command()
    {
        foreach ($this->hooksToRemove as $hook) {
            $filename = "{$this->dir}/hooks/{$hook}";

            if (! array_key_exists($hook, $this->lockFileHooks) && ! $this->force) {
                $this->info("Skipped [{$hook}] hook - not present in lock file");
                $this->lockFileHooks = file_exists($this->lockFile)
                    ? array_flip(json_decode(file_get_contents($this->lockFile)))
                    : [];
                continue;
            }

            if (array_key_exists($hook, $this->hooks) && is_file($filename)) {
                unlink($filename);
                $this->info("Removed [{$hook}] hook");
                unset($this->lockFileHooks[$hook]);
                continue;
            }

            $this->error("{$hook} hook does not exist");
        }

        file_put_contents($this->lockFile, json_encode(array_keys($this->lockFileHooks)));
    }
}
