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
 * Copyright © 2021 MultiSafepay, Inc. All rights reserved.
 * See DISCLAIMER.md for disclaimer details.
 *
 */

declare(strict_types=1);

namespace MultiSafepay\ConnectCore\Observer\Gateway;

use Magento\Framework\Event\Observer;
use Magento\Payment\Observer\AbstractDataAssignObserver;
use Magento\Quote\Api\Data\PaymentInterface;

class In3DataAssignObserver extends AbstractDataAssignObserver
{
    /**
     * @inheritDoc
     */
    public function execute(Observer $observer)
    {
        $data = $this->readDataArgument($observer);

        $additionalData = $data->getData(PaymentInterface::KEY_ADDITIONAL_DATA);
        $payment = $this->readPaymentModelArgument($observer);

        if (isset($additionalData['date_of_birth'])) {
            $payment->setAdditionalInformation('date_of_birth', $additionalData['date_of_birth']);
        }
        if (isset($additionalData['gender'])) {
            $payment->setAdditionalInformation('gender', $additionalData['gender']);
        }
        if (isset($additionalData['telephone'])) {
            $payment->setAdditionalInformation('telephone', $additionalData['telephone']);
        }
    }
}
