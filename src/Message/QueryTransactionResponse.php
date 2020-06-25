<?php
/**
 * *
 *
 * 
 * 
 */

namespace Omnipay\OnePay\Message;

/**
 * @author  tamnnit
 * @since 1.0.0
 */
class QueryTransactionResponse extends Response
{
    /**
     * {@inheritdoc}
     */
    public function isSuccessful(): bool
    {
        return parent::isSuccessful() && 0 === strcasecmp('y', $this->data['vpc_DRExists']);
    }
}
