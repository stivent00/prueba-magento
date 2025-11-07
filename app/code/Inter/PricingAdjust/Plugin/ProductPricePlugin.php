<?php
namespace Inter\PricingAdjust\Plugin;

use Inter\PricingAdjust\Helper\Data;

class ProductPricePlugin
{
    public function __construct(
        protected Data $helperData
    )
    {}

    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        return (float)$this->helperData->getNewPrice($result);
    }

    public function afterGetFinalPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        return (float)$this->helperData->getNewPrice($result);
    }
}
