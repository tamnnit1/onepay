<?php
/**
 * *
 *
 * 
 * 
 */

namespace Omnipay\OnePay\Message\Domestic;

use Omnipay\OnePay\Message\AbstractQueryTransactionRequest;

/**
 * @author  tamnnit
 * @since 1.0.0
 */
class QueryTransactionRequest extends AbstractQueryTransactionRequest
{
    protected $testEndpoint = 'https://mtf.onepay.vn/onecomm-pay/Vpcdps.op';

    protected $productionEndpoint = 'https://onepay.vn/onecomm-pay/Vpcdps.op';
}
