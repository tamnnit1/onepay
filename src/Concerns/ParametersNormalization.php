<?php
/**
 * *
 *
 * 
 * 
 */

namespace Omnipay\OnePay\Concerns;

/**
 * @author  tamnnit
 * @since 1.0.0
 */
trait ParametersNormalization
{
    /**
     * Phương thức hổ trợ xóa bỏ các ký tự `_` khi thiết lập các parameters.
     *
     * @param  array  $parameters
     * @return array
     */
    protected function normalizeParameters(array $parameters): array
    {
        $normalizedParameters = [];

        foreach ($parameters as $parameter => $value) {
            $parameter = str_replace('_', '', $parameter);
            $normalizedParameters[$parameter] = $value;
        }

        return $normalizedParameters;
    }
}
