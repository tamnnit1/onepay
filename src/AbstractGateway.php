<?php

namespace Omnipay\OnePay;

use Omnipay\Common\AbstractGateway as BaseAbstractGateway;

/**
 * @author  tamnnit
 * @since 1.0.0
 */
abstract class AbstractGateway extends BaseAbstractGateway
{
    use Concerns\Parameters;
    use Concerns\ParametersNormalization;

    /**
     * {@inheritdoc}
     */
    public function initialize(array $parameters = [])
    {
        return parent::initialize(
            $this->normalizeParameters($parameters)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultParameters(): array
    {
        return [
            'vpc_Version' => 2,
        ];
    }
}
