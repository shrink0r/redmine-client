<?php

namespace RedmineClient\Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use RedmineClient\Service\ProjectService;

class ListProjectsCommand extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('list-projects')
            ->setDescription('List all available redmine projects.')
            ->addArgument(
                'config',
                InputArgument::REQUIRED,
                'Path pointing to a valid (ini) config file.'
            )
        ;
    }

    protected function doExecute(InputInterface $input, OutputInterface $output)
    {
        $service = new ProjectService($this->getConfig());

        $output->writeln("<comment>(fetching) available projects:</comment>");
        
        foreach ($service->getAll() as $project)
        {
            $output->writeln(
                sprintf("%s <info>%s</info>", $project->getId(), $project->getName())
            );
        }
    }
}
