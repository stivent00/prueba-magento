<?php
namespace Inter\HealthCheck\Model;

use Inter\HealthCheck\Api\HealthCheckInterface;

class HealthCheck implements HealthCheckInterface
{
    public function getStatus()
    {
        return [
            'status' => 'ok',
            'message' => 'El sistema está funcionando correctamente'
        ];
    }
}
