<?php

namespace Omnipay\OnePay\Message\International;

use Omnipay\OnePay\Message\AbstractPurchaseRequest;

/**
 * @author  tamnnit
 * @since 1.0.0
 */
class PurchaseRequest extends AbstractPurchaseRequest
{
    protected $testEndpoint = 'https://onepay.vn/vpcpay/vpcpay.op';

    protected $productionEndpoint = 'https://mtf.onepay.vn/vpcpay/vpcpay.op';
}
