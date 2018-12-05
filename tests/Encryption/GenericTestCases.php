<?php

namespace MrShan0\CryptoLib\Tests\Encryption;

use MrShan0\CryptoLib\Exceptions\UnableToDecrypt;
use PHPUnit\Framework\TestCase;

abstract class GenericTestCases extends TestCase
{
    abstract public function initClass();

    public function additionProvider()
    {
        return array(
            $this->initClass(),
        );
    }

    public function getCryptoLib()
    {
        return $this->cryptolib;
    }

    protected function random_iv($cryptolib, $key)
    {
        $plainText = openssl_random_pseudo_bytes(16);

        $cipher  = $cryptolib->encryptPlainTextWithRandomIV($plainText, $key);
        $decoded = $cryptolib->decryptCipherTextWithRandomIV($cipher, $key);

        $this->assertEquals($plainText, $decoded);
    }

    protected function huge_string_random_iv($cryptolib, $key)
    {
        $plainText = openssl_random_pseudo_bytes(16000);

        $cipher  = $cryptolib->encryptPlainTextWithRandomIV($plainText, $key);
        $decoded = $cryptolib->decryptCipherTextWithRandomIV($cipher, $key);

        $this->assertEquals($plainText, $decoded);
    }

    protected function custom_iv($cryptolib, $key)
    {
        $plainText = openssl_random_pseudo_bytes(16);
        $iv               = $cryptolib->generateRandomIV();

        $cipher  = $cryptolib->encrypt($plainText, $key, $iv);
        $decoded = $cryptolib->decrypt($cipher, $key, $iv);

        $this->assertEquals($plainText, $decoded);
    }

    protected function huge_string_custom_iv($cryptolib, $key)
    {
        $plainText = openssl_random_pseudo_bytes(16000);
        $iv               = $cryptolib->generateRandomIV();

        $cipher  = $cryptolib->encryptPlainTextWithRandomIV($plainText, $key, $iv);
        $decoded = $cryptolib->decryptCipherTextWithRandomIV($cipher, $key, $iv);

        $this->assertEquals($plainText, $decoded);
    }

    protected function diff_key_expect_exception($cryptolib, $key)
    {
        $this->expectException(UnableToDecrypt::class);

        $plainText = openssl_random_pseudo_bytes(16);

        $cipher  = $cryptolib->encrypt($plainText, openssl_random_pseudo_bytes(16), $cryptolib->generateRandomIV());
        $decoded = $cryptolib->decrypt($cipher, openssl_random_pseudo_bytes(16), $cryptolib->generateRandomIV());
    }

    protected function huge_string_diff_key_expect_exception($cryptolib, $key)
    {
        $this->expectException(UnableToDecrypt::class);

        $plainText = openssl_random_pseudo_bytes(16000);

        $cipher  = $cryptolib->encrypt($plainText, openssl_random_pseudo_bytes(16), $cryptolib->generateRandomIV());
        $decoded = $cryptolib->decrypt($cipher, openssl_random_pseudo_bytes(16), $cryptolib->generateRandomIV());
    }

}
