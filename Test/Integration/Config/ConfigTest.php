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

namespace MultiSafepay\ConnectCore\Test\Integration\Config;

use MultiSafepay\ConnectCore\Config\Config;
use MultiSafepay\ConnectCore\Test\Integration\AbstractTestCase;

class ConfigTest extends AbstractTestCase
{

    /**
     * @magentoConfigFixture default_store multisafepay/general/foo bar
     */
    public function testGetValue()
    {
        $this->assertEquals('bar', $this->getConfig()->getValue('foo'));
    }

    /**
     * @magentoConfigFixture default_store multisafepay/general/mode 1
     */
    public function testGetModeIsEnabled()
    {
        $this->assertEquals(true, $this->getConfig()->getMode());
    }

    /**
     * @magentoConfigFixture default_store multisafepay/general/mode 0
     */
    public function testGetModeIsDisabled()
    {
        $this->assertEquals(false, $this->getConfig()->getMode());
    }

    /**
     * @magentoConfigFixture default_store multisafepay/general/mode 1
     * @magentoConfigFixture default_store multisafepay/general/live_api_key livekey
     * @magentoConfigFixture default_store multisafepay/general/test_api_key testkey
     */
    public function testGetLiveApiKey()
    {
        $this->assertEquals('livekey', $this->getConfig()->getApiKey());
    }

    /**
     * @magentoConfigFixture default_store multisafepay/general/mode 0
     * @magentoConfigFixture default_store multisafepay/general/live_api_key livekey
     * @magentoConfigFixture default_store multisafepay/general/test_api_key testkey
     */
    public function testGetTestApiKey()
    {
        $this->assertEquals('testkey', $this->getConfig()->getApiKey());
    }

    /**
     * @magentoConfigFixture default_store multisafepay/general/debug 1
     */
    public function testIsDebugEnabled()
    {
        $this->assertEquals(true, $this->getConfig()->isDebug());
    }

    /**
     * @magentoConfigFixture default_store multisafepay/general/debug 0
     */
    public function testIsDebugDisabled()
    {
        $this->assertEquals(false, $this->getConfig()->isDebug());
    }

    /**
     * @magentoConfigFixture default_store multisafepay/general/order_confirmation_email foobar
     */
    public function testGetOrderConfirmationEmail()
    {
        $this->assertEquals('foobar', $this->getConfig()->getOrderConfirmationEmail());
    }

    /**
     * @return Config
     */
    private function getConfig(): Config
    {
        return $this->getObjectManager()->get(Config::class);
    }
}
