<?php
namespace Inter\HealthCheck\Plugin;

use Magento\Framework\Webapi\ServiceOutputProcessor;

class ConvertResultPlugin
{
    public function aroundConvertValue(ServiceOutputProcessor $subject, callable $proceed, $data, $type)
    {
        if ($type == 'array')
            return $data;

        return $proceed($data, $type);
    }
}