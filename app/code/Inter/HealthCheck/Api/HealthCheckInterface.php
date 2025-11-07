<?php
namespace Inter\HealthCheck\Api;

interface HealthCheckInterface
{
    /**
     * Retorna el estado del sistema.
     *
     * @return array
     */
    public function getStatus();
}
