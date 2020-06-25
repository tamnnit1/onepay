<?php
/**
 * *
 * 
 * 
 */

namespace Omnipay\OnePay\Message;

/**
 * @author  tamnnit
 * @since 1.0.0
 */
abstract class AbstractSignatureRequest extends AbstractRequest
{
    use Concerns\RequestEndpoint;
    use Concerns\RequestSignature;

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        $parameters = $this->getParameters();
        call_user_func_array(
            [$this, 'validate'],
            $this->getSignatureParameters()
        );
        $parameters['vpc_SecureHash'] = $this->generateSignature();
        unset($parameters['vpc_HashKey'], $parameters['testMode']);

        return $parameters;
    }
}
