<?php

namespace Omnipay\OnePay\Message\International;

use Omnipay\OnePay\Message\AbstractQueryTransactionRequest;

/**
 * @author  tamnnit
 * @since 1.0.0
 */
class QueryTransactionRequest extends AbstractQueryTransactionRequest
{
    protected $testEndpoint = 'https://mtf.onepay.vn/vpcpay/Vpcdps.op';

    protected $productionEndpoint = 'https://onepay.vn/vpcpay/Vpcdps.op';
}
