<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace XXXX\Braintree\Gateway\Request\PayPal;

use Magento\Payment\Gateway\Request\BuilderInterface;

/**
 * Vault Data Builder
 */
class VaultDataBuilder implements BuilderInterface
{
    /**
     * Additional options in request to gateway
     */
    private static $optionsKey = 'options';

    /**
     * The option that determines whether the payment method associated with
     * ANY transaction should be stored in the Vault.
     */
    private static $storeInVault = 'storeInVault';
    /**
     * @inheritdoc
     */
    public function build(array $buildSubject): array
    {
        $result = [];

        $result[self::$optionsKey] = [
            self::$storeInVault => true
        ];

        return $result;
    }
}
