<?php
/**
 * Created by PhpStorm.
 * User: celder
 * Date: 9/9/19
 * Time: 10:57 AM
 */

namespace XXXX\Braintree\Gateway\Request;

use Magento\Payment\Gateway\Request\BuilderInterface;

class VaultDataBuilder implements BuilderInterface
{
    /**
     * Additional options in request to gateway
     */
    const OPTIONS = 'options';

    /**
     * The option that determines whether the payment method associated with
     * ANY transaction should be stored in the Vault.
     */
    const STORE_IN_VAULT = 'storeInVault';

    /**
     * @inheritdoc
     */
    public function build(array $buildSubject): array
    {
        return [
            self::OPTIONS => [
                self::STORE_IN_VAULT => true
            ]
        ];
    }
}