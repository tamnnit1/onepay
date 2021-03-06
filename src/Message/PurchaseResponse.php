<?php

namespace Omnipay\OnePay\Message;

use Omnipay\Common\Message\RequestInterface;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * @author  tamnnit
 * @since 1.0.0
 */
class PurchaseResponse extends Response implements RedirectResponseInterface
{
    /**
     * @var string
     */
    private $redirectUrl;

    /**
     * create object PurchaseResponse.
     *
     * @param  \Omnipay\Common\Message\RequestInterface  $request
     * @param $data
     * @param $redirectUrl
     */
    public function __construct(RequestInterface $request, $data, $redirectUrl)
    {
        parent::__construct($request, $data);
        $this->redirectUrl = $redirectUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function isSuccessful(): bool
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function getRedirectUrl(): string
    {
        return $this->redirectUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function isRedirect(): bool
    {
        return true;
    }
}
