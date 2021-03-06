<?php

namespace Omnipay\OnePay\Message\Concerns;

use Omnipay\OnePay\Support\Signature;
use Omnipay\Common\Exception\InvalidResponseException;

/**
 * @author  tamnnit
 * @since 1.0.0
 */
trait ResponseSignatureValidation
{
    /**
     * Check the validity of the data returned by OnePay
     *
     * @throws InvalidResponseException
     */
    protected function validateSignature(): void
    {
        $data = $this->getData();

        if (! isset($data['vpc_SecureHash'])) {
            throw new InvalidResponseException('Response from OnePay is invalid!');
        }

        $dataSignature = array_filter($data, function ($parameter) {
            return 0 === strpos($parameter, 'vpc_') && 'vpc_SecureHash' !== $parameter;
        }, ARRAY_FILTER_USE_KEY);
        $signature = new Signature(
            $this->getRequest()->getVpcHashKey()
        );

        if (! $signature->validate($dataSignature, $data['vpc_SecureHash'])) {
            throw new InvalidResponseException(sprintf('Data signature response from OnePay is invalid!'));
        }
    }
}
