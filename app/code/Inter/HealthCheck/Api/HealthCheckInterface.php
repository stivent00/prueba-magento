<?php
namespace Inter\HealthCheck\Api;

interface HealthCheckInterface
{
    /**
     * Retorna el estado del sistema.
     *
     * @return \Magento\Framework\DataObject
     */
    public function getStatus();
}
