<?php

namespace Omnipay\OnePay\Message;

/**
 * @author  tamnnit
 * @since 1.0.0
 */
abstract class AbstractPurchaseRequest extends AbstractSignatureRequest
{
    /**
     * {@inheritdoc}
     */
    public function initialize(array $parameters = [])
    {
        parent::initialize($parameters);

        $this->setParameter('vpc_Command', 'pay');
        $this->setAgainLink(
            $this->getAgainLink() ?? $this->httpRequest->getUri()
        );
        $this->setVpcTicketNo(
            $this->getVpcTicketNo() ?? $this->httpRequest->getClientIp()
        );
        $this->setTitle(
            $this->getTitle() ?? ''
        );
        $this->setCurrency(
            $this->getCurrency() ?? 'VND'
        );
        $this->setVpcLocale(
            $this->getVpcLocale() ?? 'vn'
        );

        return $this;
    }

    /**
     * {@inheritdoc}
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData(): array
    {
        $this->validate('AgainLink', 'Title');
        $data = parent::getData();
        unset($data['vpc_User'], $data['vpc_Password']);

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function sendData($data): PurchaseResponse
    {
        $redirectUrl = $this->getEndpoint().'?'.http_build_query($data);

        return $this->response = new PurchaseResponse($this, $data, $redirectUrl);
    }

    /**
     * get locale.
     *
     * @return null|string
     */
    public function getVpcLocale(): ?string
    {
        return $this->getParameter('vpc_Locale');
    }

    /**
     * set locale.
     *
     * @param  null|string  $locale
     * @return $this
     */
    public function setVpcLocale(?string $locale)
    {
        return $this->setParameter('vpc_Locale', $locale);
    }

    /**
     * link the payment page of the website before switch to OnePAY
     *
     * @return null|string
     */
    public function getAgainLink(): ?string
    {
        return $this->getParameter('AgainLink');
    }

    /**
     * set link the payment page of the website before switch to OnePAY
     *
     * @param  null|string  $link
     * @return $this
     */
    public function setAgainLink(?string $link)
    {
        return $this->setParameter('AgainLink', $link);
    }

    /**
     * return the title displays at OnePay at checkout.
     *
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->getParameter('Title');
    }

    /**
     * set the title displays at OnePay at checkout.
     *
     * @param  null|string  $title
     * @return $this
     */
    public function setTitle(?string $title)
    {
        return $this->setParameter('Title', $title);
    }

    /**
     * The mapping method of [[getClientIp()]].
     *
     * @return null|string
     * @see getClientIp
     */
    public function getVpcTicketNo(): ?string
    {
        return $this->getClientIp();
    }

    /**
     * The mapping method of [[setClientIp()]].
     *
     * @param  null|string  $ticketNo
     * @return $this
     * @see setClientIp
     */
    public function setVpcTicketNo(?string $ticketNo)
    {
        return $this->setClientIp($ticketNo);
    }

    /**
     * {@inheritdoc}
     */
    public function getClientIp(): ?string
    {
        return $this->getParameter('vpc_TicketNo');
    }

    /**
     * {@inheritdoc}
     */
    public function setClientIp($value)
    {
        return $this->setParameter('vpc_TicketNo', $value);
    }

    /**
     * The mapping method of [[getAmount()]].
     *
     * @return null|string
     * @see getAmount
     */
    public function getVpcAmount(): ?string
    {
        return $this->getAmount();
    }

    /**
     * The mapping method of [[setAmount()]].
     *
     * @param  null|string  $amount
     * @return $this
     * @see setAmount
     */
    public function setVpcAmount(?string $amount)
    {
        return $this->setAmount($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function getAmount(): ?string
    {
        return $this->getParameter('vpc_Amount');
    }

    /**
     * {@inheritdoc}
     */
    public function setAmount($value)
    {
        return $this->setParameter('vpc_Amount', $value);
    }

    /**
     * return order info.
     *
     * @return null|string
     */
    public function getVpcOrderInfo(): ?string
    {
        return $this->getParameter('vpc_OrderInfo');
    }

    /**
     * set order info.
     *
     * @param  null|string  $info
     * @return $this
     */
    public function setVpcOrderInfo(?string $info)
    {
        return $this->setParameter('vpc_OrderInfo', $info);
    }

    /**
     * return order code.
     *
     * @return null|string
     */
    public function getVpcMerchTxnRef(): ?string
    {
        return $this->getParameter('vpc_MerchTxnRef');
    }

    /**
     * set order code.
     *
     * @param  null|string  $ref
     * @return $this
     */
    public function setVpcMerchTxnRef(?string $ref)
    {
        return $this->setParameter('vpc_MerchTxnRef', $ref);
    }

    /**
     * return currency.
     *
     * @return null|string
     */
    public function getVpcCurrency(): ?string
    {
        return $this->getCurrency();
    }

    /**
     * set currency.
     *
     * @param  null|string  $currency
     * @return $this
     */
    public function setVpcCurrency(?string $currency)
    {
        return $this->setCurrency($currency);
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrency(): ?string
    {
        return ($currency = $this->getParameter('vpc_Currency')) ? strtoupper($currency) : null;
    }

    /**
     * {@inheritdoc}
     */
    public function setCurrency($value)
    {
        return $this->setParameter('vpc_Currency', $value);
    }

    /**
     * return phone of customer.
     *
     * @return null|string
     */
    public function getVpcCustomerPhone(): ?string
    {
        return $this->getParameter('vpc_Customer_Phone');
    }

    /**
     * set phone of customer.
     *
     * @param  null|string  $phone
     * @return $this
     */
    public function setVpcCustomerPhone(?string $phone)
    {
        return $this->setParameter('vpc_Customer_Phone', $phone);
    }

    /**
     * return id customer.
     *
     * @return null|string
     */
    public function getVpcCustomerId(): ?string
    {
        return $this->getParameter('vpc_Customer_Id');
    }

    /**
     * set id customer.
     *
     * @param  null|string  $id
     * @return $this
     */
    public function setVpcCustomerId(?string $id)
    {
        return $this->setParameter('vpc_Customer_Id', $id);
    }

    /**
     * The mapping method of [[getReturnUrl()]].
     *
     * @return null|string
     * @see getReturnUrl
     */
    public function getVpcReturnURL(): ?string
    {
        return $this->getReturnUrl();
    }

    /**
     * The mapping method of [[setReturnUrl()]].
     *
     * @param  null|string  $url
     * @return $this
     * @see setReturnUrl
     */
    public function setVpcReturnURL(?string $url)
    {
        return $this->setReturnUrl($url);
    }

    /**
     * {@inheritdoc}
     */
    public function getReturnUrl(): ?string
    {
        return $this->getParameter('vpc_ReturnURL');
    }

    /**
     * {@inheritdoc}
     */
    public function setReturnUrl($value)
    {
        return $this->setParameter('vpc_ReturnURL', $value);
    }

    /**
     * return email customer.
     *
     * @return null|string
     */
    public function getVpcCustomerEmail(): ?string
    {
        return $this->getParameter('vpc_Customer_Email');
    }

    /**
     * set email customer.
     *
     * @param  null|string  $email
     * @return $this
     */
    public function setVpcCustomerEmail(?string $email)
    {
        return $this->setParameter('vpc_Customer_Email', $email);
    }

    /**
     * {@inheritdoc}
     */
    protected function getSignatureParameters(): array
    {
        $parameters = [
            'vpc_Version', 'vpc_Currency', 'vpc_Command', 'vpc_AccessCode', 'vpc_Merchant', 'vpc_Locale',
            'vpc_ReturnURL', 'vpc_MerchTxnRef', 'vpc_OrderInfo', 'vpc_Amount', 'vpc_TicketNo',
        ];

        if ($this->getVpcCustomerId()) {
            $parameters[] = 'vpc_Customer_Id';
        }

        if ($this->getVpcCustomerEmail()) {
            $parameters[] = 'vpc_Customer_Email';
        }

        if ($this->getVpcCustomerPhone()) {
            $parameters[] = 'vpc_Customer_Phone';
        }

        return $parameters;
    }
}
