<?php

namespace Omnipay\OnePay\Message;

/**
 * @author  tamnnit
 * @since 1.0.0
 */
class IncomingRequest extends AbstractRequest
{
    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        call_user_func_array(
            [$this, 'validate'],
            array_keys($parameters = $this->getIncomingParameters())
        );

        return $parameters;
    }

    /**
     * {@inheritdoc}
     * @throws \Omnipay\Common\Exception\InvalidResponseException
     */
    public function sendData($data): IncomingResponse
    {
        return $this->response = new IncomingResponse($this, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function initialize(array $parameters = [])
    {
        parent::initialize($parameters);

        foreach ($this->getIncomingParameters() as $parameter => $value) {
            $this->setParameter($parameter, $value);
        }

        return $this;
    }

    /**
     * return list parameters.
     *
     * @return array
     */
    protected function getIncomingParameters(): array
    {
        return $this->httpRequest->query->all();
    }
}
