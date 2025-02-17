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
 * Copyright © 2022 MultiSafepay, Inc. All rights reserved.
 * See DISCLAIMER.md for disclaimer details.
 *
 */

declare(strict_types=1);

namespace MultiSafepay\ConnectCore\Gateway\Validator\Gateway;

class DirectBankTransferValidator extends BaseGatewayValidator
{
    public const AVAILABLE_VALIDATORS = [
        'bank_account_number',
        'empty_field'
    ];

    public const EMPTY_VALIDATOR_FIELDS = [
        'account_id',
        'account_holder_name',
        'account_holder_city',
        'account_holder_country',
        'account_holder_bic',
    ];
}
