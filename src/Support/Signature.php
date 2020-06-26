<?php

namespace Omnipay\OnePay\Support;

/**
 * @author  tamnnit
 * @since 1.0.0
 */
class Signature
{
    /**
     * secret key for creating and checking data signatures.
     *
     * @var string
     */
    protected $hashKey;

    /**
     * create object dataSignature.
     *
     * @param  string  $hashKey
     */
    public function __construct(string $hashKey)
    {
        $this->hashKey = pack('H*', $hashKey);
    }

    /**
     * return data signature of transmitted data.
     *
     * @param  array  $data
     * @return string
     */
    public function generate(array $data): string
    {
        ksort($data);
        $dataSign = urldecode(http_build_query($data));

        return strtoupper(hash_hmac('sha256', $dataSign, $this->hashKey));
    }

    /**
     * Check the validity of the data signature against the transmitted data.
     *
     * @param  array  $data
     * @param  string  $expect
     * @return bool
     */
    public function validate(array $data, string $expect): bool
    {
        $actual = $this->generate($data);

        return 0 === strcasecmp($expect, $actual);
    }
}
