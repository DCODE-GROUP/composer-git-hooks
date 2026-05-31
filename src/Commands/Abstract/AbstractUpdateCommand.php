<?php

namespace Dcodegroup\GitHooks\Commands\Abstract;

use Symfony\Component\Console\Input\InputInterface;

abstract class AbstractUpdateCommand extends AbstractAddCommand
{
    protected function init(InputInterface $input)
    {
        $this->windows = $input->getOption('force-win') || is_windows();
        $this->force = true;
        $this->noLock = true;
        $this->ignoreLock = false;
    }

    protected function command()
    {
        if (empty($this->dir)) {
            if ($this->global) {
                $this->error('You need to run the add command globally first before you try to update');
            } else {
                $this->error('You did not specify a git directory to use');
            }

            return;
        }

        parent::command();
    }
}
