<?php

namespace Dcodegroup\GitHooks\Commands\Legacy;

use Dcodegroup\GitHooks\Commands\Abstract\AbstractAddCommand;
use Symfony\Component\Console\Input\InputOption;

class AddCommand extends AbstractAddCommand
{
    protected function configure()
    {
        $this
            ->setName('add')
            ->setDescription('Adds git hooks from the composer config')
            ->setHelp('This command allows you to add git hooks')
            ->addOption('force', 'f', InputOption::VALUE_NONE, 'Override existing git hooks')
            ->addOption('no-lock', 'l', InputOption::VALUE_NONE, 'Do not create a lock file')
            ->addOption('ignore-lock', 'i', InputOption::VALUE_NONE, 'Add the lock file to .gitignore')
            ->addOption('git-dir', 'g', InputOption::VALUE_REQUIRED, 'Path to git directory')
            ->addOption('lock-dir', null, InputOption::VALUE_REQUIRED, 'Path to lock file directory', getcwd())
            ->addOption('force-win', null, InputOption::VALUE_NONE, 'Force windows bash compatibility')
            ->addOption('global', null, InputOption::VALUE_NONE, 'Add global git hooks')
        ;
    }
}
