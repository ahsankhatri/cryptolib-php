<?php

namespace MrShan0\CryptoLib\Tests\Encryption;

class AES_256_CBC_Test extends GenericTestCases
{
    protected $cryptolib;

    public function initClass()
    {
        $secretKey       = openssl_random_pseudo_bytes(16);
        $this->cryptolib = new \MrShan0\CryptoLib\CryptoLib([
            'method' => 'AES-256-CBC',
        ]);

        // Do not change this return order.
        return [
            $this->getCryptoLib(),
            $secretKey,
        ];
    }

    /**
     * @test
     *
     * @dataProvider additionProvider
     */
    public function random_iv($cryptolib, $key)
    {
        parent::random_iv($cryptolib, $key);
    }

    /**
     * @test
     *
     * @dataProvider additionProvider
     */
    public function huge_string_random_iv($cryptolib, $key)
    {
        parent::huge_string_random_iv($cryptolib, $key);
    }

    /**
     * @test
     *
     * @dataProvider additionProvider
     */
    public function custom_iv($cryptolib, $key)
    {
        parent::custom_iv($cryptolib, $key);
    }

    /**
     * @test
     *
     * @dataProvider additionProvider
     */
    public function huge_string_custom_iv($cryptolib, $key)
    {
        parent::huge_string_custom_iv($cryptolib, $key);
    }

    /**
     * @test
     *
     * @dataProvider additionProvider
     */
    public function diff_key_expect_exception($cryptolib, $key)
    {
        parent::diff_key_expect_exception($cryptolib, $key);
    }

    /**
     * @test
     *
     * @dataProvider additionProvider
     */
    public function huge_string_diff_key_expect_exception($cryptolib, $key)
    {
        parent::huge_string_diff_key_expect_exception($cryptolib, $key);
    }

}
