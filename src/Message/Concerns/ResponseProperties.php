<?php

namespace Omnipay\OnePay\Message\Concerns;

/**
 * @author  tamnnit
 * @since 1.0.0
 */
trait ResponseProperties
{
    /**
     * Create properties of object from data sent from OnePay.
     *
     * @param  string  $name
     * @return null|string
     */
    public function __get($name)
    {
        $property = $this->propertyNormalize($name);

        if (isset($this->data[$property])) {
            return $this->data[$property];
        } else {
            trigger_error(sprintf('Undefined property: %s::%s', __CLASS__, '$'.$name), E_USER_NOTICE);

            return;
        }
    }

    /**
     * protect the properties of objects from data sent from OnePay.
     *
     * @param  string  $name
     * @param  mixed  $value
     * @return null|string
     */
    public function __set($name, $value)
    {
        $property = $this->propertyNormalize($name);

        if (isset($this->data[$property])) {
            trigger_error(sprintf('Undefined property: %s::%s', __CLASS__, '$'.$name), E_USER_NOTICE);
        } else {
            $this->$name = $value;
        }
    }

    /**
     * Convert the `vpcAbc` property to` vpc_Abc`.
     *
     * @param  string  $property
     * @return string
     */
    private function propertyNormalize(string $property): string
    {
        if (0 === strpos($property, 'vpc') && false === strpos($property, '_')) {
            return 'vpc_'.substr($property, 3);
        }

        return $property;
    }
}
