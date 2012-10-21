<?php

namespace RedmineClient\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use RedmineClient\Service\Config;

abstract class BaseCommand extends Command
{
    private $config;

    abstract protected function doExecute(InputInterface $input, OutputInterface $output);

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->validateInput($input);

        $this->config = new Config($input->getArgument('config'));
        
        $this->doExecute($input, $output);
    }

    protected function getConfig()
    {
        return $this->config;
    }

    protected function validateInput(InputInterface $input)
    {
        $config = $input->getArgument('config');

        if (! is_readable(realpath($config)))
        {
            throw new Exception(
                sprintf('The given `config` argument path `%s` is not readable.', $config)
            );
        }
    }
}
