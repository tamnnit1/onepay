<?php
/**
 * *
 *
 * 
 * 
 */

namespace Omnipay\OnePay\Message;

use Omnipay\Common\Message\RequestInterface;

/**
 * @author  tamnnit
 * @since 1.0.0
 */
class IncomingResponse extends Response
{
    use Concerns\ResponseSignatureValidation;

    /**
     * Khởi tạo đối tượng Response.
     *
     * @param  \Omnipay\Common\Message\RequestInterface  $request
     * @param $data
     * @throws \Omnipay\Common\Exception\InvalidResponseException
     */
    public function __construct(RequestInterface $request, $data)
    {
        parent::__construct($request, $data);

        if ($this->isSuccessful()) {
            $this->validateSignature();
        }
    }
}
