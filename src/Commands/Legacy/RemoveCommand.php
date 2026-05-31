<?php

namespace Dcodegroup\GitHooks\Commands\Legacy;

use Dcodegroup\GitHooks\Commands\Abstract\AbstractRemoveCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class RemoveCommand extends AbstractRemoveCommand
{
    protected function configure()
    {
        $this
            ->setName('remove')
            ->setDescription('Remove git hooks specified in the composer config')
            ->setHelp('This command allows you to remove git hooks')
            ->addArgument(
                'hooks',
                InputArgument::IS_ARRAY,
                'Hooks to be removed'
            )
            ->addOption(
                'force',
                'f',
                InputOption::VALUE_NONE,
                'Delete hooks without checking the lock file'
            )
            ->addOption('git-dir', 'g', InputOption::VALUE_REQUIRED, 'Path to git directory')
            ->addOption('lock-dir', null, InputOption::VALUE_REQUIRED, 'Path to lock file directory', getcwd())
            ->addOption('global', null, InputOption::VALUE_NONE, 'Remove global git hooks')
        ;
    }
}
