<?php

namespace Dcodegroup\GitHooks\Commands\Legacy;

use Dcodegroup\GitHooks\Commands\Abstract\AbstractUpdateCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;

class UpdateCommand extends AbstractUpdateCommand
{
    protected function configure()
    {
        $this
            ->setName('update')
            ->setDescription('Update git hooks specified in the composer config')
            ->setHelp('This command allows you to update git hooks')
            ->addOption('git-dir', 'g', InputOption::VALUE_REQUIRED, 'Path to git directory')
            ->addOption('lock-dir', null, InputOption::VALUE_REQUIRED, 'Path to lock file directory', getcwd())
            ->addOption('force-win', null, InputOption::VALUE_NONE, 'Force windows bash compatibility')
            ->addOption('global', null, InputOption::VALUE_NONE, 'Update global git hooks')
        ;
    }
}
