<?php
namespace Inter\HealthCheck\Console\Command;

use Magento\Framework\Console\Cli;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\App\ProductMetadataInterface;

class HealthCheckCommand extends Command
{
    protected $resource;
    protected $productMetadata;
    
    public function __construct(
        ResourceConnection $resource,
        ProductMetadataInterface $productMetadata
    ) {
        $this->resource = $resource;
        $this->productMetadata = $productMetadata;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('inter:health:check')
            ->setDescription('Verifica el estado del sistema');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $status = 'ok';
        $dbStatus = 'unknown';
        $message = 'El sistema está funcionando correctamente.';

        try {
            $connection = $this->resource->getConnection();
            $connection->query('SELECT 1');
            $dbStatus = 'connected';
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'error: ' . $e->getMessage();
        }

        $output->writeln('<info>## Health Check - Magento ##</info>');
        $output->writeln('status: ' . ($status === 'ok' ? '<info>ok</info>' : '<error>error</error>'));
        $output->writeln('message: ' . $message);
        $output->writeln('php_version: ' . phpversion());
        $output->writeln('magento_version: ' . $this->productMetadata->getVersion());
        $output->writeln('db_connection: ' . $dbStatus);

        return Cli::RETURN_SUCCESS;
    }
}
