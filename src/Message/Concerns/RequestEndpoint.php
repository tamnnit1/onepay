<?php

namespace Omnipay\OnePay\Message\Concerns;

/**
 * @author  tamnnit
 * @since 1.0.0
 */
trait RequestEndpoint
{
    /**
     * @var string
     */
    protected $productionEndpoint;

    /**
     * @var string
     */
    protected $testEndpoint;

    /**
     * return url connect OnePay.
     *
     * @return string
     */
    protected function getEndpoint(): string
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->productionEndpoint;
    }
}
