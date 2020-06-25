<?php
/**
 * *
 *
 * 
 * 
 */

namespace Omnipay\OnePay\Message\Domestic;

use Omnipay\OnePay\Message\AbstractPurchaseRequest;

/**
 * @author  tamnnit
 * @since 1.0.0
 */
class PurchaseRequest extends AbstractPurchaseRequest
{
    protected $testEndpoint = 'https://mtf.onepay.vn/onecomm-pay/vpc.op';

    protected $productionEndpoint = 'https://onepay.vn/onecomm-pay/vpc.op';
}
