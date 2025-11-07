<?php
namespace Inter\HealthCheck\Model;

use Inter\HealthCheck\Api\HealthCheckInterface;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\App\ProductMetadataInterface;

class HealthCheck implements HealthCheckInterface
{
    public function __construct(
        protected ResourceConnection $resource,
        protected ProductMetadataInterface $productMetadata
    ) {}

    public function getStatus()
    {
        $status = 'ok';
        $message = 'El sistema está funcionando correctamente';
        $dbStatus = 'unknown';
        try {
            $connection = $this->resource->getConnection();
            $connection->query('SELECT 1');
            $dbStatus = 'connected';
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'error: ' . $e->getMessage();
        }

        return [
            'status' => $status,
            'message' => $message,
            'php_version' => phpversion(),
            'magento_version' => $this->productMetadata->getVersion(),
            'db_connection' => $dbStatus
        ];
    }
}
