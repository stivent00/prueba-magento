<?php
namespace Inter\HealthCheck\Console\Command;

use Magento\Framework\Console\Cli;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HealthCheckCommand extends Command
{
    protected function configure()
    {
        $this->setName('inter:health:check')
            ->setDescription('Verifica el estado del sistema');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>El sistema está funcionando correctamente</info>');
        return Cli::RETURN_SUCCESS;
    }
}
