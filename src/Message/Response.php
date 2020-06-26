<?php

namespace Omnipay\OnePay\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * @method AbstractRequest getRequest()
 *
 * @author  tamnnit
 * @since 1.0.0
 */
class Response extends AbstractResponse
{
    use Concerns\ResponseProperties;

    /**
     * {@inheritdoc}
     */
    public function isSuccessful(): bool
    {
        return '0' === $this->getCode();
    }

    /**
     * {@inheritdoc}
     */
    public function isCancelled(): bool
    {
        return '99' === $this->getCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getMessageByCode(): ?string
    {
        switch ($this->getCode()) {
            case "0" :
                $result = "Approved";
                break;
            case "1" :
                $result = "Bank Declined";
                break;
            case "3" :
                $result = "Merchant not exist";
                break;
            case "4" :
                $result = "Invalid access code";
                break;
            case "5" :
                $result = "Invalid amount";
                break;
            case "6" :
                $result = "Invalid currency code";
                break;
            case "7" :
                $result = "Unspecified Failure ";
                break;
            case "8" :
                $result = "Invalid card Number";
                break;
            case "9" :
                $result = "Invalid card name";
                break;
            case "10" :
                $result = "Expired Card";
                break;
            case "11" :
                $result = "Card Not Registed Service(internet banking)";
                break;
            case "12" :
                $result = "Invalid card date";
                break;
            case "13" :
                $result = "Exist Amount";
                break;
            case "21" :
                $result = "Insufficient fund";
                break;
            case "99" :
                $result = "User cancel";
                break;
            default :
                $result = "Failured";
        }
        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function getMessage(): ?string
    {
        return $this->data['vpc_Message'] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getCode(): ?string
    {
        return $this->data['vpc_TxnResponseCode'] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getTransactionId(): ?string
    {
        return $this->data['vpc_MerchTxnRef'] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getTransactionReference(): ?string
    {
        return $this->data['vpc_TransactionNo'] ?? null;
    }
}
