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

namespace MultiSafepay\ConnectCore\Model\Api\Validator;

use DateTime;

class DateOfBirthValidator
{
    public const DATE_FORMAT = 'Y-m-d';

    /**
     * @param string $dateOfBirth
     * @return bool
     */
    public function validate(string $dateOfBirth): bool
    {
        $date = DateTime::createFromFormat(self::DATE_FORMAT, $dateOfBirth);

        return $date && $date->format(self::DATE_FORMAT) === $dateOfBirth;
    }
}
