<?php
namespace Inter\HealthCheck\Model;

use Inter\HealthCheck\Api\HealthCheckInterface;
use Magento\Framework\DataObject;

class HealthCheck implements HealthCheckInterface
{
    public function getStatus()
    {
        return new DataObject([
            'status' => 'ok',
            'message' => 'El sistema está funcionando correctamente'
        ]);
    }
}
