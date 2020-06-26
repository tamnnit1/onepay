<?php

namespace Omnipay\OnePay\Message\Concerns;

use Omnipay\OnePay\Support\Signature;

/**
 * @author  tamnnit
 * @since 1.0.0
 */
trait RequestSignature
{
    /**
     * return Electronic Signature [[getSignatureParameters()]].
     *
     * @return string
     */
    protected function generateSignature(): string
    {
        $data = [];
        $signature = new Signature(
            $this->getVpcHashKey()
        );

        foreach ($this->getSignatureParameters() as $parameter) {
            $data[$parameter] = $this->getParameter($parameter);
        }

        return $signature->generate($data);
    }

    /**
     * return list parameters use to create digital signatures.
     *
     * @return array
     */
    abstract protected function getSignatureParameters(): array;
}
