<?php

namespace RedmineClient\Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use RedmineClient\Service\IssueService;

/**
 * @todo a arguments for fetching issues by user and project.
 */
class ListIssuesCommand extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('list-issues')
            ->setDescription('List all existing redmine issues.')
            ->addArgument(
                'config',
                InputArgument::REQUIRED,
                'Path pointing to a valid (ini) config file.'
            )
        ;
    }

    protected function doExecute(InputInterface $input, OutputInterface $output)
    {
        $service = new IssueService($this->getConfig());

        $output->writeln("<comment>(fetching) existing issues:</comment>");
        
        foreach ($service->getAll() as $issue)
        {
            $output->writeln(
                sprintf("%s <info>%s</info>", $issue->getId(), $issue->getSubject())
            );
        }
    }
}
