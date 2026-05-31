<?php

namespace Dcodegroup\GitHooks\Commands\Legacy;

use Dcodegroup\GitHooks\Commands\Abstract\AbstractHookCommand;

class HookCommand extends AbstractHookCommand
{
    protected function configure()
    {
        $this
            ->setName($this->hook)
            ->setDescription("Test your {$this->hook} hook")
            ->setHelp("This command allows you to test your {$this->hook} hook")
        ;
    }
}
