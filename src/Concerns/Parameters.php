<?php

namespace Omnipay\OnePay\Concerns;

/**
 * @author  tamnnit
 * @since 1.0.0
 */
trait Parameters
{
    /**
     * get merchant id.
     *
     * @return null|string
     */
    public function getVpcMerchant(): ?string
    {
        return $this->getParameter('vpc_Merchant');
    }

    /**
     * set merchant id.
     *
     * @param  null|string  $merchant
     * @return $this
     */
    public function setVpcMerchant(?string $merchant)
    {
        return $this->setParameter('vpc_Merchant', $merchant);
    }

    /**
     * get access code.
     *
     * @return null|string
     */
    public function getVpcAccessCode(): ?string
    {
        return $this->getParameter('vpc_AccessCode');
    }

    /**
     * set access code.
     *
     * @param  null|string  $code
     * @return $this
     */
    public function setVpcAccessCode(?string $code)
    {
        return $this->setParameter('vpc_AccessCode', $code);
    }

    /**
     * get hash key.
     *
     * @return null|string
     */
    public function getVpcHashKey(): ?string
    {
        return $this->getParameter('vpc_HashKey');
    }

    /**
     * set hash key (secure hash).
     *
     * @param  null|string  $key
     * @return $this
     */
    public function setVpcHashKey(?string $key)
    {
        return $this->setParameter('vpc_HashKey', $key);
    }

    /**
     * get user.
     *
     * @return null|string
     */
    public function getVpcUser(): ?string
    {
        return $this->getParameter('vpc_User');
    }

    /**
     * set user.
     *
     * @param  null|string  $user
     * @return $this
     */
    public function setVpcUser(?string $user)
    {
        return $this->setParameter('vpc_User', $user);
    }

    /**
     * get password.
     *
     * @return null|string
     */
    public function getVpcPassword(): ?string
    {
        return $this->getParameter('vpc_Password');
    }

    /**
     * set password.
     *
     * @param  null|string  $password
     * @return $this
     */
    public function setVpcPassword(?string $password)
    {
        return $this->setParameter('vpc_Password', $password);
    }

    /**
     * get version.
     *
     * @return null|string
     */
    public function getVpcVersion(): ?string
    {
        return $this->getParameter('vpc_Version');
    }

    /**
     * set version.
     *
     * @param  null|string  $version
     * @return $this
     */
    public function setVpcVersion(?string $version)
    {
        return $this->setParameter('vpc_Version', $version);
    }
}
