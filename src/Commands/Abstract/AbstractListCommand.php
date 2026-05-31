<?php

namespace Dcodegroup\GitHooks\Commands\Abstract;

use Symfony\Component\Console\Input\InputInterface;

abstract class AbstractListCommand extends AbstractCommand
{
    protected function init(InputInterface $input)
    {
    }

    protected function command()
    {
        foreach (array_keys($this->hooks) as $hook) {
            $filename = "{$this->dir}/hooks/{$hook}";

            if (is_file($filename)) {
                $this->info("[{$hook}]");
            }
        }
    }
}
