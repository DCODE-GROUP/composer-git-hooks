<?php

namespace Dcodegroup\GitHooks\Commands\Legacy;

use Dcodegroup\GitHooks\Commands\Abstract\AbstractListCommand;
use Symfony\Component\Console\Input\InputOption;

class ListCommand extends AbstractListCommand
{
    protected function configure()
    {
        $this
            ->setName('list-hooks')
            ->setDescription('List added hooks')
            ->setHelp('This command allows you to list your git hooks')
            ->addOption('git-dir', 'g', InputOption::VALUE_REQUIRED, 'Path to git directory')
            ->addOption('lock-dir', null, InputOption::VALUE_REQUIRED, 'Path to lock file directory', getcwd())
            ->addOption('global', null, InputOption::VALUE_NONE, 'Perform hook command globally for every git repository')
        ;
    }
}
