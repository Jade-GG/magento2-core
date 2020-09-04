<?php
/**
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is provided with Magento in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * Copyright © 2020 MultiSafepay, Inc. All rights reserved.
 * See DISCLAIMER.md for disclaimer details.
 *
 */

declare(strict_types=1);

namespace MultiSafepay\ConnectCore\Gateway\Validator;

use Magento\Payment\Gateway\Config\Config;
use Magento\Quote\Api\Data\CartInterface;

class CustomerGroupValidator
{

    /**
     * @param CartInterface $quote
     * @param $config
     * @return bool
     */
    public function validate(CartInterface $quote, Config $config): bool
    {
        $storeId = $quote->getStoreId();

        if ((int)$config->getValue('allow_specific_customer_group', $storeId) === 1) {
            $availableCustomerGroups = explode(
                ',',
                $config->getValue('allowed_customer_group', $storeId)
            );

            if (!in_array($quote->getCustomerGroupId(), $availableCustomerGroups, true)) {
                return true;
            }
        }
        return false;
    }
}
