<?php

namespace RedmineClient\Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use RedmineClient\Service\UserService;

/**
 * @todo a arguments for fetching users by project.
 */
class ListUsersCommand extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('list-users')
            ->setDescription('List all existing redmine users.')
            ->addArgument(
                'config',
                InputArgument::REQUIRED,
                'Path pointing to a valid (ini) config file.'
            )
        ;
    }

    protected function doExecute(InputInterface $input, OutputInterface $output)
    {
        $service = new UserService($this->getConfig());

        $output->writeln("<comment>(fetching) existing users:</comment>");
        
        foreach ($service->getAll() as $user)
        {
            $output->writeln(
                sprintf("%s <info>%s</info>", $user->getId(), $user->getSubject())
            );
        }
    }
}
