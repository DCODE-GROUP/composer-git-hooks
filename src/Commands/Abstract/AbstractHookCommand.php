<?php

namespace Dcodegroup\GitHooks\Commands\Abstract;

use Dcodegroup\GitHooks\Hook;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

abstract class AbstractHookCommand extends SymfonyCommand
{
    protected $hook;
    protected $contents;
    protected $composerDir;

    public function __construct($hook, $contents, $composerDir)
    {
        $this->hook     = $hook;
        $this->contents = $contents;
        $this->composerDir = $composerDir;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $contents = Hook::getHookContents($this->composerDir, $this->contents, $this->hook);
        $outputMessage = [];
        $returnCode    = SymfonyCommand::SUCCESS;
        exec($contents, $outputMessage, $returnCode);

        $output->writeln(implode(PHP_EOL, $outputMessage));

        return $returnCode;
    }
}
