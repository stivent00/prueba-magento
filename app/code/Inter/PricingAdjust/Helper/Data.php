<?php
namespace Inter\PricingAdjust\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_PERCENTAGE = 'inter/pricing_adjust/percentage_adjust';

    public function getPercentageAdjust($store = null)
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_PERCENTAGE,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }

    public function getNewPrice($price)
    {
        $percentage = (float)$this->getPercentageAdjust();
        if ($price > 0 && $percentage > 0) {
            $price += $price * ($percentage / 100);
        }
        return $price;
    }
}